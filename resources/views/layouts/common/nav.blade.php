<div class="links-wrapper">
    <ul class="tab tab-block" data-tooltip="{{ __('Tu sei qui') }}">
        <li class="tab-item">
            <a href="{{ route_locale('home') }}">{{ __('Home') }}</a>
        </li>
        <li class="tab-item">
            <a href="{{ route_locale('about-me') }}">{{ __('Chi sono') }}</a>
        </li>
        <li class="tab-item">
            <a href="{{ route_locale('contact-me') }}">{{ __('Contattami') }}</a>
        </li>
        @if (app()->getLocale() === 'it')
            <li class="tab-item">
                <a href="{{ route('home', ['locale' => 'en']) }}"><span class="english-flag-background change-locale" >English website</span></a>
            </li>
        @else
            <li class="tab-item">
                <a href="{{ route('home', ['locale' => 'it']) }}"><span class="italian-flag-background change-locale">Sito italiano</span></a>
            </li>
        @endif
    </ul>
</div>
