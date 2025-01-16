<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lunar\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::search('')->paginate(9);
        //dd($products);

        return view('pages.products.index', [
            'products' => $products
        ]);
    }
}
