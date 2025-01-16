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

    <div class="container">
        <div class="row mb-4 gy-4">
            @foreach ($products as $product)
                <div class="g-col-sm-6 col-lg-3 d-flex align-items-stretch">
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
                                href="#"
                                class="btn btn-primary"
                            >
                                View
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{ $products->links() }}
        </div>
    </div>
</x-layout.site.app>
