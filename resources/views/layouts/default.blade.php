<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.common.head')
</head>
<body>
    <div class="mobile-menu-wrapper">
        @include('layouts.common.mobile-menu')
    </div>
    <main>
        @yield('content')
    </main>
    <footer>
        @include('layouts.common.footer')
    </footer>
    <div class="mobile-bottom-menu-spacer"></div>
</body>
</html>
