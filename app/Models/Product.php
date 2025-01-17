<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Lunar\Models\Product as LunarProduct;

class Product extends LunarProduct
{
    public function makeSearchableUsing(Collection $models): Collection
    {
        return $models->load(['collections', 'brand', 'productType', 'thumbnail', 'variants']);
    }

    public function toSearchableArray(): array
    {
        $data = array_merge([
            'id' => (string) $this->id,
            'status' => $this->status,
            'product_type' => $this->productType->name,
            'brand_id' => $this->brand?->id,
            'created_at' => (int) $this->created_at->timestamp,
        ]);

        if ($thumbnail = $this->thumbnail) {
            $data['thumbnail'] = $thumbnail->getUrl('small');
        }

        $data['skus'] = $this->variants->pluck('sku')->toArray();
        $data['categories'] = $this->collections->map(function ($collection) {
            return $collection->id;
        })->toArray();

        return $data;
    }
}
