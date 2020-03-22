<div class="image-container">
    @component('components.async-img', ['src' => asset('/img/logo-transparent.png'), 'ratio' => 125/500, 'style' => 'max-width: 200px; margin: 0 auto; padding: .5rem 0'])
    @endcomponent
</div>

<nav class="main-nav">
    <ul class="tab tab-block" data-tooltip="{{ __('Tu sei qui') }}">
        <li class="tab-item">
            <a class="tooltip-right" href="{{ route('home') }}">{{ __('Home') }}</a>
        </li>
        <li class="tab-item">
            <a class="tooltip-right" href="{{ route('about-me') }}">{{ __('Chi sono') }}</a>
        </li>
        <li class="tab-item">
            <a class="tooltip-left" href="{{ route('projects') }}">{{ __('Progetti') }}</a>
        </li>
        <li class="tab-item">
            <a class="tooltip-left" href="{{ route('contact-me') }}">{{ __('Contattami') }}</a>
        </li>
    </ul>
</nav>
<nav class="main-nav bottom">
    <ul class="tab tab-block" data-tooltip="{{ __('Tu sei qui') }}">
        <li class="tab-item">
            <a class="tooltip-right" href="{{ route('home') }}">{{ __('Home') }}</a>
        </li>
        <li class="tab-item">
            <a class="tooltip-right" href="{{ route('about-me') }}">{{ __('Chi sono') }}</a>
        </li>
        <li class="tab-item">
            <a class="tooltip-left" href="{{ route('projects') }}">{{ __('Progetti') }}</a>
        </li>
        <li class="tab-item">
            <a class="tooltip-left" href="{{ route('contact-me') }}">{{ __('Contattami') }}</a>
        </li>
    </ul>
</nav>


