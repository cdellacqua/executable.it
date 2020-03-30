<nav class="main-nav">
    <div class="menu" data-tooltip="{{ __('Tu sei qui') }}">
        <div class="menu-item logo-container">
            @component('components.async-img', ['src' => asset('/img/logo-colors.svg').'?v4', 'ratio' => 0.24, 'style' => 'max-width: 300px; margin: 0 auto; padding: 2rem 0'])
            @endcomponent
        </div>
        <div class="divider"></div>
        <div class="menu-item">
            <a class="tooltip-right" href="{{ route('home') }}"><span class="underline">{{ __('Home') }}</span></a>
        </div>
        <div class="menu-item">
            <a class="tooltip-right" href="{{ route('about-me') }}"><span class="underline">{{ __('Chi sono') }}</span></a>
        </div>
        <div class="menu-item">
            <a class="tooltip-right" href="{{ route('projects') }}"><span class="underline">{{ __('Progetti') }}</span></a>
        </div>
        <div class="menu-item">
            <a class="tooltip-right" href="{{ route('contact-me') }}"><span class="underline">{{ __('Contattami') }}</span></a>
        </div>
        <footer>
            @include('layouts.common.footer')
        </footer>
    </div>
</nav>
