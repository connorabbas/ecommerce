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

        $products = $productsSearchQuery
            ->paginate(perPage: $filters->perPage, page: $filters->currentPage)
            ->withQueryString()
            ->through(function ($product) {
                return SearchEngineProduct::fromLunarProduct($product);
            });

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

        return $products;
    }
}
