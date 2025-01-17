<div class="card flex-fill">
    <img
        class="card-img-top"
        src="{{ $product->thumbnail->getUrl('medium') }}"
        alt="{{ $product->record_title }}"
    >
    <div class="card-body">
        <h5 class="card-title">{{ $product->record_title }}</h5>
        <p class="card-text">...</p>
        <a
            href="{{ route('products.show', ['product' => $product->defaultUrl->slug]) }}"
            class="btn btn-primary"
        >
            View
        </a>
    </div>
</div>
