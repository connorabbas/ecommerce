<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lunar\Models\Product;

class ProductSearchController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::search('')->paginate(8);

        if (
            $request->header('hx-request')
            && $request->header('hx-target') == 'product-results-container'
        ) {
            return view('pages.products.partials.product-results', [
                'products' => $products
            ]);
        }

        return view('pages.products.index', [
            'products' => $products
        ]);
    }
}
