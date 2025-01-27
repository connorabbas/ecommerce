<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        return view('pages.cart.show');
    }

    public function destroy()
    {
        session()->forget('cart');

        // TODO: HTMX

        return redirect()->back()->with('success', 'Cart has been cleared!');
    }
}
