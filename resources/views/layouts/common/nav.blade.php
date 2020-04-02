<div class="links-wrapper">
    <ul class="tab tab-block" data-tooltip="{{ __('Tu sei qui') }}">
        @if (request()->route())
            <li class="tab-item language-switch-item hide-md" style="visibility: hidden;">
                <span class="language-switch">
                    <a data-lang="it" href="{{ route(request()->route()->getName() ?? 'home', ['locale' => 'it']) }}" title="Sito in italiano" onclick="this.nextElementSibling.children[0].checked = false"><img alt="it" class="icon" src="{{ '/img/flags/it.png' }}"></a>
                    <label class="form-switch" title="Cambia lingua/Switch language">
                        <input type="checkbox" {{ app()->getLocale() === 'en' ? 'checked' : '' }} onchange=""><i class="form-icon"></i>
                    </label>
                    <a data-lang="en" href="{{ route(request()->route()->getName() ?? 'home', ['locale' => 'en']) }}" title="English website" onclick="this.previousElementSibling.children[0].checked = true"><img alt="en" class="icon" src="{{ '/img/flags/en.png' }}"></a>
                </span>
            </li>
        @endif
        <li class="tab-item">
            <a href="{{ route_locale('home') }}" title="{{ __('Home') }}">{{ __('Home') }}</a>
        </li>
        <li class="tab-item">
            <a href="{{ route_locale('about-me') }}" title="{{ __('Chi sono') }}">{{ __('Chi sono') }}</a>
        </li>
        <li class="tab-item">
            <a href="{{ route_locale('contacts') }}" title="{{ __('Contatti') }}">{{ __('Contatti') }}</a>
        </li>
        @if (request()->route())
            <li class="tab-item language-switch-item">
                <span class="language-switch">
                    <a data-lang="it" href="{{ route(request()->route()->getName() ?? 'home', ['locale' => 'it']) }}" title="Sito in italiano" onclick="this.nextElementSibling.children[0].checked = false"><img alt="it" class="icon" src="{{ '/img/flags/it.png' }}"></a>
                    <label class="form-switch" title="Cambia lingua/Switch language">
                        <input type="checkbox" {{ app()->getLocale() === 'en' ? 'checked' : '' }} onchange=""><i class="form-icon"></i>
                    </label>
                    <a data-lang="en" href="{{ route(request()->route()->getName() ?? 'home', ['locale' => 'en']) }}" title="English website" onclick="this.previousElementSibling.children[0].checked = true"><img alt="en" class="icon" src="{{ '/img/flags/en.png' }}"></a>
                </span>
            </li>
        @endif
    </ul>
</div>
