<?php

namespace App\Repositories\Contracts;

use App\DataTransferObjects\Filtering\ProductSearchFilters;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface SearchEngine
{
    public function searchProducts(ProductSearchFilters $filters): Collection|LengthAwarePaginator;
    public function searchProductsRaw(ProductSearchFilters $filters): Collection|LengthAwarePaginator;
}
