<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.common.head')
</head>
<body>
    <div class="show-lg">
        @include('layouts.common.mobile-menu')
    </div>
    <div class="container">
        <div class="columns">
            <aside class="column col-3 hide-lg">
                @include('layouts.common.desktop-menu')
            </aside>
            <div class="column col-3 hide-lg">
                <!-- aside placeholder -->
            </div>
            <div class="column col-9 col-lg-12">
                <main>
                    @yield('content')
                </main>
                <footer>
                    @include('layouts.common.footer')
                </footer>
            </div>
        </div>
    </div>
    <div class="show-lg mobile-bottom-menu-spacer"></div>
</body>
</html>
