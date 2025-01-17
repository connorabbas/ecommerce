<?php

namespace App\Repositories\Implementations;

use App\DataTransferObjects\Entities\SearchEngineProduct;
use App\DataTransferObjects\Filtering\ProductSearchFilters;
use App\Models\Product;
use App\Repositories\Contracts\SearchEngine;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class MeilisearchEngine implements SearchEngine
{
    public function searchProducts(ProductSearchFilters $filters): Collection|LengthAwarePaginator
    {
        $filterString = '';
        if (is_array($filters->categoryIds) && !empty($filters->categoryIds)) {
            $ids = implode(', ', $filters->categoryIds);
            $filterString = "categories IN [{$ids}]";
        }
        //dd('here');

        $productsSearchQuery = Product::search(
            $filters->searchTerm ?? '',
            function ($meilisearch, $query, $options) use ($filterString) {
                if ($filterString) {
                    $options['filter'] = $filterString;
                }
                return $meilisearch->search($query, $options);
            }
        );

        $productsSearchQuery = Product::query();

        $products = $productsSearchQuery
            ->paginate(perPage: $filters->perPage, page: $filters->currentPage)
            ->withQueryString()
            ->through(function ($product) {
                // Log memory usage
                \Log::debug('Memory before transform:', [
                    'usage' => memory_get_usage(true) / 1024 / 1024 . 'MB',
                    'peak' => memory_get_peak_usage(true) / 1024 / 1024 . 'MB'
                ]);

                try {
                    // Log product data
                    \Log::debug('Processing product:', [
                        'id' => $product->id ?? null,
                        'class' => get_class($product)
                    ]);

                    // Check if product is valid
                    if (!$product instanceof Product) {
                        throw new \Exception('Invalid product type: ' . get_class($product));
                    }

                    $result = SearchEngineProduct::fromLunarProduct($product);

                    // Log successful transformation
                    \Log::debug('Transform successful:', ['product_id' => $result->id]);

                    return $result;
                } catch (\Throwable $e) {
                    \Log::error('Transform failed:', [
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString(),
                        'memory' => memory_get_usage(true) / 1024 / 1024 . 'MB'
                    ]);
                    throw $e;
                }
            });
        //$products = SearchEngineProduct::collect($products);

        dd('here');

        return $products;
    }

    public function searchProductsRaw(ProductSearchFilters $filters): Collection|LengthAwarePaginator
    {
        // Search products
        // https://www.meilisearch.com/docs/learn/filtering_and_sorting/filter_search_results#use-filter-when-searching
        // https://www.meilisearch.com/docs/learn/filtering_and_sorting/filter_expression_reference

        $filterString = '';
        if (is_array($filters->categoryIds) && !empty($filters->categoryIds)) {
            $ids = implode(', ', $filters->categoryIds);
            $filterString = "categories IN [{$ids}]";
        }

        $searchResults = Product::search(
            $filters->searchTerm ?? '',
            function ($meilisearch, $query, $options) use ($filters, $filterString) {
                if ($filterString) {
                    $options['filter'] = $filterString;
                }

                $options['limit'] = $filters->perPage;
                $options['offset'] = ($filters->currentPage - 1) * $filters->perPage;

                return $meilisearch->search($query, $options);
            }
        )->raw();

        //dd($searchResults);
        $hits = collect($searchResults['hits'])->map(function ($product) {
            return SearchEngineProduct::fromMeilisearchIndexedProduct($product);
        });

        $products = new LengthAwarePaginator(
            $hits,
            $searchResults['nbHits'],
            $filters->perPage,
            $filters->currentPage,
            ['path' => request()->url()]
        );
        //$products = SearchEngineProduct::collect($products);
        //$products = $products->through(fn($product) => SearchEngineProduct::fromMeilisearchIndexedProduct($product));

        return $products;
    }
}
