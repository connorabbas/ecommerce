<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\Filtering\ProductSearchFilters;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Lunar\Models\Collection;

class ProductSearchController extends Controller
{
    public function __construct(protected SearchService $searchService)
    {
        //
    }

    public function index(Request $request)
    {
        $products = $this->searchService->searchProducts(
            filters: ProductSearchFilters::fromRequest($request->merge(['per_page' => 8])),
            raw: true,
        );

        // Check for HTMX request
        if (
            $request->header('hx-request')
            && $request->header('hx-target') == 'product-results-container'
        ) {
            return view('pages.products.partials.product-results', compact('products'));
        }

        // TODO: abstract
        $collections = Collection::whereIsRoot()
            ->with(['children'])
            ->orderBy('_lft')
            ->get();

        return view('pages.products.index', [
            'products' => $products,
            'collections' => $collections,
        ]);
    }
}
