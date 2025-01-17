<x-layout.site.app>
    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li
            class="breadcrumb-item active"
            aria-current="page"
        >
            Product Search
        </li>
    </x-slot>

    <div
        class="container"
        id="product-results-container"
    >
        @include('pages.products.partials.product-results', [$products])
    </div>
</x-layout.site.app>
