<?php

namespace App\Services;

use App\DataTransferObjects\Filtering\ProductSearchFilters;
use App\Repositories\Contracts\SearchEngine;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SearchService
{
    public function __construct(protected SearchEngine $searchEngine)
    {
        //
    }

    public function searchProducts(ProductSearchFilters $filters, bool $raw = false): Collection|LengthAwarePaginator
    {
        return $raw
            ? $this->searchEngine->searchProductsRaw($filters)
            : $this->searchEngine->searchProducts($filters);
    }
}
