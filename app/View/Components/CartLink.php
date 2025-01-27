<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartLink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $cart = session()->get('cart', []);
        $cartItemsCount = collect($cart)->sum('qty');

        return view('components.cart-link', [
            'cartItemsCount' => $cartItemsCount
        ]);
    }
}
