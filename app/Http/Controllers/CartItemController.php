<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\View\Components\CartLink;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function store(Request $request)
    {
        // TODO: replace with Lunar implementation, testing HTMX functionality for now
        $validatedData = $request->validate([
            'sku' => ['required'],
            'qty' => ['required', 'integer', 'min:1'],
        ]);

        $cart = session()->get('cart', []);
        $cart[] = [
            'sku' => $validatedData['sku'],
            'qty' => (int) $validatedData['qty'],
        ];
        session()->put('cart', $cart);

        // Check for HTMX request and return partial view
        if (
            $request->header('hx-request')
            && $request->header('hx-target') == 'cart-link'
        ) {
            return (new CartLink())->render();
        }

        return redirect()->back()->with('success', 'Item added to your cart!');
    }
}
