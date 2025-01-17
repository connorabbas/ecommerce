<?php

namespace App\Http\Controllers;

use App\Traits\FetchesUrls;
use Lunar\Models\Product;

class ProductController extends Controller
{
    use FetchesUrls;

    public function show(Product $product)
    {
        return view('pages.products.show', [
            'product' => $product
        ]);
    }
}
