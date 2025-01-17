<?php

namespace App\Http\Controllers;

use Lunar\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('pages.products.show', [
            'product' => $product
        ]);
    }
}
