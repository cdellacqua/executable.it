<nav class="main-nav">
    <div class="menu" data-tooltip="{{ __('Tu sei qui') }}">
        <div class="menu-item logo-container">
            @component('components.async-img', ['src' => asset('/img/logo-colors.svg').'?v4', 'ratio' => 0.24, 'style' => 'max-width: 300px; margin: 0 auto; padding: 2rem 0'])
            @endcomponent
        </div>
        <div class="divider"></div>
        <div class="menu-item">
            <a class="tooltip-right" href="{{ route('home') }}">{{ __('Home') }}</a>
        </div>
        <div class="menu-item">
            <a class="tooltip-right" href="{{ route('about-me') }}">{{ __('Chi sono') }}</a>
        </div>
        <div class="menu-item">
            <a class="tooltip-right" href="{{ route('projects') }}">{{ __('Progetti') }}</a>
        </div>
        <div class="menu-item">
            <a class="tooltip-right" href="{{ route('contact-me') }}">{{ __('Contattami') }}</a>
        </div>
        <footer>
            @include('layouts.common.footer')
        </footer>
    </div>
</nav>
