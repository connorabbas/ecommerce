<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lunar\Models\Collection;

class CategoryChildrenController extends Controller
{
    public function __invoke(Request $request, Collection $collection)
    {
        $collection->load('children');
        if ($request->header('hx-request')) {
            return view('components.product.filtering.child-category-filter', [
                'category' => $collection,
            ]);
        }

        abort(204);
    }
}
