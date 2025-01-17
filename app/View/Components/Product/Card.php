<?php

namespace App\View\Components\Product;

use App\DataTransferObjects\Entities\SearchEngineProduct;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public SearchEngineProduct $product)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.card', [
            'product' => $this->product
        ]);
    }
}
