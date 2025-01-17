<div class="card flex-fill">
    <img
        class="card-img-top"
        src="{{ $product->thumbnail->getUrl('medium') }}"
        alt="{{ $product->translateAttribute('name') }}"
    >
    <div class="card-body">
        <h5 class="card-title">{{ $product->translateAttribute('name') }}</h5>
        <p class="card-text">...</p>
        <a
            href="{{ route('products.show', ['product' => $product->defaultUrl->slug]) }}"
            class="btn btn-primary"
        >
            View
        </a>
    </div>
</div>
