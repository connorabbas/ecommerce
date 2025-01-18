<x-layout.site.app>
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.search') }}">Product Search</a></li>
        <li
            class="breadcrumb-item active"
            aria-current="page"
        >
            Product {{ $product->record_title }}
        </li>
    </x-slot:breadcrumbs>

    <div
        class="container"
        id="product-results-container"
    >
        <div class="row">
            <div class="col-lg-7">
                <img
                    class="card-img-top"
                    src="{{ $product->thumbnail->getUrl('large') }}"
                    alt="{{ $product->record_title }}"
                >
            </div>
            <div class="col-lg-4">
                <h1>{{ $product->record_title }}</h1>
                <p class="text-muted">{{ $product->translateAttribute('description') }}</p>
            </div>
        </div>
    </div>
</x-layout.site.app>
