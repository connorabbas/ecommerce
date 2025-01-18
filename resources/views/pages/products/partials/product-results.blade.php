<div class="row mb-4 gy-4">
    @foreach ($products as $product)
        <div class="col-sm-6 col-lg-3 d-flex align-items-stretch">
            <x-product.card :product="$product" />
        </div>
    @endforeach
</div>
<div
    id="pagination-links"
    hx-boost="true"
    hx-target="#product-results-container"
>
    {{ $products->links() }}
</div>
{{-- Alternatively if more control is needed at the link --}}
{{--<div id="pagination-links">
    {{ $products->links('components.htmx-paginator', ['target' => '#product-results-container']) }}
</div> --}}
