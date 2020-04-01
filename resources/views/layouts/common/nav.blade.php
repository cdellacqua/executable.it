<div class="links-wrapper">
    <ul class="tab tab-block" data-tooltip="{{ __('Tu sei qui') }}">
        <li class="tab-item">
            <a href="{{ route_locale('home') }}" title="{{ __('Home') }}">{{ __('Home') }}</a>
        </li>
        <li class="tab-item">
            <a href="{{ route_locale('about-me') }}" title="{{ __('Chi sono') }}">{{ __('Chi sono') }}</a>
        </li>
        <li class="tab-item">
            <a href="{{ route_locale('contacts') }}" title="{{ __('Contatti') }}">{{ __('Contatti') }}</a>
        </li>

        <li class="tab-item">
            <span class="language-switch">
                <a data-lang="it" href="{{ route('home', ['locale' => 'it']) }}" title="Sito in italiano" onclick="this.nextElementSibling.children[0].checked = false"><img alt="it" class="icon" src="{{ '/img/flags/it.png' }}"></a>
                <label class="form-switch" title="Cambia lingua/Switch language">
                    <input type="checkbox" {{ app()->getLocale() === 'en' ? 'checked' : '' }} onchange=""><i class="form-icon"></i>
                </label>
                <a data-lang="en" href="{{ route('home', ['locale' => 'en']) }}" title="English website" onclick="this.previousElementSibling.children[0].checked = true"><img alt="en" class="icon" src="{{ '/img/flags/en.png' }}"></a>
            </span>
        </li>

        <!--
        @if (app()->getLocale() === 'it')
            <li class="tab-item">
                <a href="{{ route('home', ['locale' => 'en']) }}" title="English website"><img class="icon" src="{{ '/img/flags/en.png' }}"> EN</a>
            </li>
        @else
            <li class="tab-item">
                <a href="{{ route('home', ['locale' => 'it']) }}" title="Sito in italiano">IT <img class="icon" src="{{ '/img/flags/it.png' }}"></a>
            </li>
        @endif
        -->
    </ul>
</div>
