<?php

namespace App\View\Components\Product\Filtering;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Lunar\Models\Collection;

class ChildCategoryFilter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Collection $collection)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.filtering.child-category-filter', [
            'category' => $this->collection,
        ]);
    }
}
