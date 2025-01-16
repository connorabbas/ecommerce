<!-- resources/views/components/layout.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>{{ config('app.name', 'Ecommerce') }}</title>

    {{-- Scripts needed for every page --}}
    @vite(['resources/assets/styles/app.scss', 'resources/assets/js/app.js'])

    {{-- Scripts loaded on the fly --}}
    @stack('head')
</head>

{{-- bg-light --}}

<body class="">
    <div
        id="site-wrapper"
        class="d-flex flex-column"
    >
        <header id="header-content">
            <x-layout.site.header.banner />
            <x-layout.site.header.nav />
            <x-layout.site.header.mobile />
        </header>
        <main id="main-content">
            @if (isset($breadcrumbs))
                <div
                    class="container pt-4 pb-0"
                    id="breadcrumb-container"
                >
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            {{ $breadcrumbs }}
                        </ol>
                    </nav>
                </div>
            @endif
            <div class="py-4">
                {{ $slot }}
            </div>
        </main>
        <footer
            id="footer-content"
            class="mt-auto position-relative"
        >
            <x-layout.site.footer />
        </footer>
    </div>
    <button
        id="scrollToTop"
        title="Go to top"
        style="display: none;"
    >
        <i class="bi bi-arrow-up"></i>
    </button>
</body>

</html>
