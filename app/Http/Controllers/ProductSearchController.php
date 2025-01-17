<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\Filtering\ProductSearchFilters;
use App\Services\SearchService;
use Illuminate\Http\Request;

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

        return view('pages.products.index', [
            'products' => $products
        ]);
    }
}
