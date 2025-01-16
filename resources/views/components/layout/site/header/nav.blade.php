<nav
    id="header-nav"
    class="shadow-sm"
>
    <div
        id="header-nav-top"
        class="border-bottom"
    >
        <div class="bg-white">
            <div class="container d-flex justify-content-between align-items-center pt-3 pb-1 pb-md-3">
                <div>
                    <!-- Off-canvas trigger for mobile -->
                    <button
                        class="me-3 btn btn d-lg-none p-0"
                        type="button"
                        title="Toggle Menu"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar"
                    >
                        <i class="bi bi-list lh-0 fs-1"></i>
                    </button>
                </div>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <a
                        class="navbar-brand"
                        href="/"
                    >
                        <img
                            id="header-nav-img"
                            src="/images/logo.png"
                            alt="Logo"
                            title="Ecommerce Logo"
                        >
                    </a>
                </div>
                <div class="d-none d-md-flex flex-grow-1 px-3 px-lg-5">
                    <div
                        class="input-group m-0"
                        id="desktop-search"
                    >
                        <input
                            type="text"
                            class="form-control bg-light"
                            placeholder="Enter search term, model #, or SKU #"
                            aria-describedby="desktop-search-button"
                        >
                        <button
                            class="btn btn-primary"
                            type="button"
                            id="desktop-search-button"
                            title="Search"
                        >
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="dropdown me-3 d-none d-lg-inline">
                        <button
                            class="btn btn-light border"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            title="Account"
                        >
                            <i class="bi bi-person me-1"></i> Hey, Connor! <i class="bi bi-chevron-down ms-1"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="/account"
                                >
                                    <i class="bi bi-gear me-2"></i> Account Dashboard
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                >
                                    <i class="bi bi-clock-history me-2"></i> Order History
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                >
                                    <i class="bi bi-star me-2"></i> My Lists
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                >
                                    <i class="bi bi-box-arrow-left me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex">
                        <a
                            href="/example"
                            class="d-none d-lg-flex btn btn-light border position-relative"
                            title="View Your Shopping Cart"
                            id="desktop-cart-link"
                        >
                            <i class="bi bi-cart3 me-1"></i><span class="d-none d-lg-inline"> Cart</span>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            >
                                5
                            </span>
                        </a>
                        <a
                            href="/example"
                            class="d-flex d-lg-none btn p-0 me-2 position-relative"
                            title="View Your Shopping Cart"
                            id="mobile-cart-link"
                        >
                            <i class="bi bi-cart3 fs-3 me-1"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            >
                                5
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-md-none pb-2 bg-white">
            <div class="container">
                <div
                    class="input-group m-0"
                    id="mobile-search"
                >
                    <input
                        type="text"
                        class="form-control form-control-sm bg-light"
                        placeholder="Enter search term, model #, or SKU #"
                        aria-describedby="mobile-search-button"
                    >
                    <button
                        class="btn btn-sm btn-primary"
                        type="button"
                        id="mobile-search-button"
                        title="Search"
                    >
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div
        id="header-nav-bottom"
        class="navbar navbar-expand-lg py-0 bg-white border-bottom"
    >
        <div class="container py-0">
            <div class="d-none d-lg-flex">
                <div class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link main-nav-link"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            Shop <i class="bi bi-chevron-down ms-1"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="{{ route('products.search') }}"
                                >
                                    Products
                                </a>
                            </li>
                        </ul>
                    </li>
                    <a
                        class="nav-link main-nav-link"
                        href="#"
                    >
                        Start Saving <i class="bi bi-chevron-down ms-1"></i>
                    </a>
                    <a
                        class="nav-link main-nav-link me-0"
                        href="#"
                    >
                        Contact <i class="bi bi-chevron-down ms-1"></i>
                    </a>
                </div>
            </div>
            <div class="d-none d-lg-flex"></div>
            <div class="d-flex justify-content-center flex-grow-1 flex-lg-grow-0">
                <div class="dropdown">
                    <a
                        class="nav-link main-nav-link px-0 me-0"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        title="Current Store"
                    >
                        <div
                            class="d-inline-block"
                            id="current-store-status"
                        >
                            <div class="d-block d-sm-inline-block">
                                <i class="bi bi-geo-alt-fill text-danger"></i>
                                <span class="fw-bold">Store Location</span>
                                <span class="d-none d-sm-inline-block">-</span>
                            </div>
                            <div class="d-none d-sm-inline-block">
                                <span class="fw-bold text-success">Open</span> <span class="text-muted">until 8:00
                                    PM</span>
                            </div>
                        </div>
                        <i class="bi bi-chevron-down ms-1"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li>
                            <a
                                class="dropdown-item"
                                href="#"
                            >
                                <i class="bi bi-info-circle me-2"></i> Store Information
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="#"
                            >
                                <i class="bi bi-geo-alt me-2"></i> Change Store
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
