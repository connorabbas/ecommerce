<x-layout.site.app>
    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li
            class="breadcrumb-item active"
            aria-current="page"
        >
            Account
        </li>
    </x-slot>

    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h1 class="fw-bolder fs-2 mb-0">Account Dashboard</h1>
                {{-- <hr class="my-2"> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="mb-4">
                    <h5 class="fw-bolder mb-2">Account Settings</h5>
                    <div class="list-group list-group-flush">
                        <a
                            href="#"
                            class="list-group-item list-group-item-action border-0 rounded-3 active"
                            aria-current="true"
                        >
                            <i class="bi bi-grid me-1"></i> Dashboard
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action border-0 rounded-3"
                            aria-current="true"
                        >
                            <i class="bi bi-person me-1"></i> Profile Details
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action border-0 rounded-3"
                        ><i class="bi bi-geo-alt me-1"></i> Address Book</a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action border-0 rounded-3"
                        ><i class="bi bi-envelope-at me-1"></i> Email Preferences</a>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="fw-bolder mb-2">Lists & Payments</h5>
                    <div class="list-group list-group-flush">
                        <a
                            href="#"
                            class="list-group-item list-group-item-action border-0 rounded-3"
                            aria-current="true"
                        >
                            <i class="bi bi-clock-history me-1"></i> Order History
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action border-0 rounded-3"
                            aria-current="true"
                        >
                            <i class="bi bi-list-ul me-1"></i> My Saved Lists
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action border-0 rounded-3"
                            aria-current="true"
                        >
                            <i class="bi bi-wallet2 me-1"></i> Card Wallet
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action border-0 rounded-3"
                            aria-current="true"
                        >
                            <i class="bi bi-credit-card me-1"></i> Add Credit Card
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <x-general.simple-card class="text-center">
                </x-general.simple-card>
            </div>
        </div>
    </div>
</x-layout.site.app>
