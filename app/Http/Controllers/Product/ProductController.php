<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Traits\FetchesUrls;
use Illuminate\Http\Request;
use Lunar\Models\Product;

class ProductController extends Controller
{
    use FetchesUrls;

    public function show(Product $product, string $slug)
    {
        /* $product = $this->fetchUrl(
            $slug,
            (new Product)->getMorphClass(),
            [
                'element.media',
                'element.variants.basePrices.currency',
                'element.variants.basePrices.priceable',
                'element.variants.values.option',
            ]
        ); */
        return view('pages.products.show', [
            'product' => $product
        ]);
    }
}
