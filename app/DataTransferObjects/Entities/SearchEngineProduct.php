<?php

namespace App\DataTransferObjects\Entities;

use App\Models\Product;
use Spatie\LaravelData\Dto;

class SearchEngineProduct extends Dto
{
    public function __construct(
        public int $id,
        public string $title,
        public string $slug,
        public string $thumbnail,
    ) {
        //
    }

    /**
     * @param array<string, mixed> $product
     */
    public static function fromMeilisearchIndexedProduct(array $product): self
    {
        return new self(
            id: $product['id'],
            title: $product['title'],
            slug: $product['slug'],
            thumbnail: $product['thumbnail'],
        );
    }

    public static function fromLunarProduct(Product $product): self
    {
        return new self(
            id: $product->id,
            title: $product->record_title,
            slug: $product->defaultUrl->slug,
            thumbnail: $product->thumbnail->getUrl('medium'),
        );
    }
}
