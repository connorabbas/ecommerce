<x-layout.site.app>
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li
            class="breadcrumb-item active"
            aria-current="page"
        >
            Product Search
        </li>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('pages.products.partials.search-filters')
            </div>
            <div class="col-lg-9">
                <div id="product-results-container">
                    @include('pages.products.partials.product-results', [$products])
                </div>
            </div>
        </div>
    </div>
</x-layout.site.app>
