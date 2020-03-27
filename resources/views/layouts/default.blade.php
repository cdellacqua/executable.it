<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.common.head')
</head>
<body>
    <div class="show-lg mobile-menu-wrapper">
        @include('layouts.common.mobile-menu')
    </div>
    <div class="container" style="margin: 0; padding: 0;">
        <div class="columns col-gapless">
            <aside class="column col-3 col-xl-4 hide-lg">
                @include('layouts.common.desktop-menu')
            </aside>
            <div class="column col-3 col-xl-4 hide-lg">
                <!-- aside placeholder -->
            </div>
            <div class="column col-9 col-xl-8 col-lg-12">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    <div class="show-lg mobile-bottom-menu-spacer"></div>
</body>
</html>
