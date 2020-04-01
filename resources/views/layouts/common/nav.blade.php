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
                <a href="{{ route('home', ['locale' => 'en']) }}"><span class="change-locale-wrapper english-flag-background"><span class="change-locale">English website</span><span class="change-locale-placeholder">English website</span></span></a>
            </li>
        @else
            <li class="tab-item">
                <a href="{{ route('home', ['locale' => 'it']) }}"><span class="change-locale-wrapper italian-flag-background"><span class="change-locale">Sito italiano</span><span class="change-locale-placeholder">Sito italiano</span></span></a>
            </li>
        @endif
    </ul>
</div>
