<x-layout.site.app>
    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.search') }}">Product Search</a></li>
        <li
            class="breadcrumb-item active"
            aria-current="page"
        >
            Product {{ $product->translateAttribute('name') }}
        </li>
    </x-slot>

    <div
        class="container"
        id="product-results-container"
    >
        <div class="row">
            <div class="col">
                <h1>{{ $product->translateAttribute('name') }}</h1>
            </div>
        </div>
    </div>
</x-layout.site.app>
