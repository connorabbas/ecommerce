<a
    href="{{ route('cart.show') }}"
    class="d-none d-lg-flex btn btn-light border position-relative"
    title="View Your Shopping Cart"
    id="desktop-cart-link"
>
    <i class="bi bi-cart3 me-1"></i><span class="d-none d-lg-inline"> Cart</span>
    @if ($cartItemsCount)
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $cartItemsCount }}
        </span>
    @endif
</a>
<a
    href="{{ route('cart.show') }}"
    class="d-flex d-lg-none btn p-0 me-2 position-relative"
    title="View Your Shopping Cart"
    id="mobile-cart-link"
>
    <i class="bi bi-cart3 fs-3 me-1"></i>
    @if ($cartItemsCount)
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $cartItemsCount }}
        </span>
    @endif
</a>
