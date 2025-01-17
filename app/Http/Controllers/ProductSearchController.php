<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lunar\Models\Collection;
use Lunar\Models\Product;

class ProductSearchController extends Controller
{
    public function index(Request $request)
    {
        // Search products
        // https://www.meilisearch.com/docs/learn/filtering_and_sorting/filter_search_results#use-filter-when-searching
        // https://www.meilisearch.com/docs/learn/filtering_and_sorting/filter_expression_reference

        $searchTerm = $request->input('search_term', '');
        $categoryIds = $request->input('category_ids', []);

        $filterString = '';
        if (!empty($categoryIds)) {
            $ids = implode(', ', $categoryIds);
            $filterString = "categories IN [{$ids}]";
        }

        $products = Product::search(
            $searchTerm,
            function ($meilisearch, $query, $options) use ($filterString) {
                if ($filterString) {
                    $options['filter'] = $filterString;
                }
                return $meilisearch->search($query, $options);
            }
        )->paginate(8);

        // Filtering options
        $collections = Collection::get();

        if (
            $request->header('hx-request')
            && $request->header('hx-target') == 'product-results-container'
        ) {
            return view('pages.products.partials.product-results', [
                'products' => $products
            ]);
        }

        return view('pages.products.index', [
            'collections' => $collections,
            'products' => $products
        ]);
    }
}
