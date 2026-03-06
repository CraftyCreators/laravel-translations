<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>
        {{ ($breadcrumb = Breadcrumbs::current()) ? $breadcrumb->title . ' - ' . config('app.name', 'Laravel') : config('app.name', 'Laravel') }}
    </title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" type="image/png" href="{{ theme_url('images/favicon.png') }}">
    <link rel="stylesheet"
        href="https://fonts.bunny.net/css2?family=Plus Jakarta Sans:wght@200;300;400;600;700&display=swap">
    @vite(['resources/themes/admin/assets/sass/app.scss', 'resources/themes/admin/assets/sass/translation/app.scss', 'resources/themes/admin/assets/js/app.js'])
    {!! Meta::toHtml() !!}
    @stack('page_header')
    <wireui:scripts />
    <script src="{{ asset('vendor/translations/app.js') }}" defer></script>
</head>

<body>
    <x-admin-sidebar />
    <div class="wrapper d-flex flex-column min-vh-100">
        <x-application-header />
        <div class="body flex-grow-1 px-3">
            <div class="container-fluid">
                <div class="breadcrumbs-container mb-4">
                    {{ Breadcrumbs::render() }}
                </div>
                <x-application-alerts />
                {{ $slot }}
            </div>
        </div>
        <x-application-footer />
    </div>

    @livewire('livewire-ui-modal')
    <x-notifications z-index="z-50" />
    <x-dialog z-index="z-50" blur="md" align="center" />
    <x-application-messages />
    <x-application-logout-form />
    @yield('footer_scripts')
    @stack('page_scripts')
</body>

</html>
