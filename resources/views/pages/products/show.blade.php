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

    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <img
                    class="card-img-top"
                    src="{{ $product->thumbnail->getUrl('large') }}"
                    alt="{{ $product->record_title }}"
                >
            </div>
            <div class="col-lg-4">
                <div>
                    <h1>{{ $product->record_title }}</h1>
                    <p class="text-muted">{{ $product->translateAttribute('description') }}</p>
                </div>
                <div>
                    <form
                        id="add-to-cart-form"
                        method="POST"
                        action="{{ route('cart.item.store') }}"
                    >
                        @csrf
                        {{-- TODO: variants --}}
                        <input
                            type="hidden"
                            name="sku"
                            value="{{ $product?->variants ? $product->variants[0]->sku : $product->sku }}"
                        >
                        <input
                            type="hidden"
                            name="qty"
                            value="1"
                        >
                        {{-- No JS Fallback --}}
                        <noscript>
                            <button
                                class="btn btn-primary"
                                type="submit"
                            >
                                <i class="bi bi-cart-plus me-1"></i> Add to Cart
                            </button>
                        </noscript>
                    </form>
                    <button
                        class="btn btn-primary"
                        hx-post="{{ route('cart.item.store') }}"
                        hx-include="#add-to-cart-form"
                        hx-target="#cart-link"
                        hx-swap="innerHtml"
                    >
                        <i class="bi bi-cart-plus me-1"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout.site.app>
