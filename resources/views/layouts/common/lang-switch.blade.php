@if (request()->route() && request()->route()->getName())
    <li class="tab-item language-switch-item">
        <span class="language-switch">
            <a data-lang="it" rel="alternate" hreflang="it" href="{{ route(request()->route()->getName(), ['locale' => 'it']) }}" title="Sito in italiano" onclick="this.nextElementSibling.children[0].checked = false"><img alt="it" class="icon" src="{{ '/img/flags/it.png' }}"></a>
            <label class="form-switch" title="Cambia lingua/Switch language">
                <input type="checkbox" {{ app()->getLocale() === 'en' ? 'checked' : '' }} onchange=""><i class="form-icon"></i>
            </label>
            <a data-lang="en" rel="alternate" hreflang="en" href="{{ route(request()->route()->getName(), ['locale' => 'en']) }}" title="English website" onclick="this.previousElementSibling.children[0].checked = true"><img alt="en" class="icon" src="{{ '/img/flags/en.png' }}"></a>
        </span>
    </li>
@endif
