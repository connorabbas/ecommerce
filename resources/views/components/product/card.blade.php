<div class="card flex-fill shadow-sm">
    <img
        class="card-img-top"
        src="{{ $product->thumbnail }}"
        alt="{{ $product->title }} Thumbnail"
    >
    <div class="card-body d-flex flex-column gap-3">
        <div class="flex-fill">
            <h5 class="card-title">{{ $product->title }}</h5>
            <p class="card-text">...</p>
        </div>
        <div>
            <a
                href="{{ route('products.show', ['product' => $product->slug]) }}"
                class="btn btn-primary w-100"
            >
                View <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
