<x-layout.site.app>
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li
            class="breadcrumb-item active"
            aria-current="page"
        >Example</li>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <form
                    method="POST"
                    action="{{ route('cart.destroy') }}"
                >
                    @csrf
                    @method('DELETE')
                    <button
                        class="btn btn-danger"
                        type="submit"
                    >
                        Delete Cart
                    </button>
                </form>
                @dump(session('cart'))
            </div>
        </div>
    </div>
</x-layout.site.app>
