<?php

namespace App\DataTransferObjects\Filtering;

use Illuminate\Http\Request;
use Spatie\LaravelData\Data;

class ProductSearchFilters extends Data
{
    public ?int $perPage = null;
    public ?int $currentPage = null;
    public ?string $searchTerm = null;
    /**
     * @var int[]|null
     */
    public ?array $categoryIds = null;
    /**
     * @var array<string, string>|null
     */
    public ?array $attributes = null;

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'perPage' => $request->input('per_page', 20),
            'currentPage' => $request->input('page', 1),
            'searchTerm' => $request->input('search_term', ''),
            'categoryIds' => is_array($request->input('categories', []))
                ? $request->input('categories')
                : [$request->input('categories')],
            'attributes' => $request->input('attributes'),
        ]);
    }
}
