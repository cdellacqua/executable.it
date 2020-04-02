<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('/favicon.png') }}">

    <title>@yield('title')</title>
    <meta name="robots" content="noindex,nofollow" />

    <link rel="stylesheet" href="{{ mix('/plugins/spectre-0.5.8/spectre.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free-5.12.1-web/fontawesome.css') }}">

    <script src="{{ mix('/js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    @if(config('app.env') == 'local')
        <script src="{{ config('app.url') }}:35729/livereload.js"></script>
    @endif

</head>
<body>
    <div class="mobile-menu-wrapper">
        @include('layouts.common.mobile-menu')
    </div>
    <main>
        <div class="background-small">
            <section class="fill-height padding vertical-center text-center first-scroll-height">
                <div class="container">
                    <div class="columns">
                        <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto">
                            <h1><span class="elevation">@yield('code') | @yield('title')</span></h1>
                            <p>
                                @yield('message')
                            </p>
                            <p>
                                <a href="{{ route_locale('home') }}" title="{{ __('Torna all\'homepage') }}">{{ __('Torna all\'homepage') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <footer>
        @include('layouts.common.footer')
    </footer>
    <div class="mobile-bottom-menu-spacer"></div>
</body>
</html>
