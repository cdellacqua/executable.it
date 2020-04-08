<div class="links-wrapper">
    <ul class="tab tab-block" data-tooltip="{{ __('Tu sei qui') }}">
        <li class="tab-item hide-md">&nbsp;</li>
        <li class="tab-item">
            <a href="{{ route_locale('home') }}" title="{{ __('Home') }}">{{ __('Home') }}</a>
        </li>
        <li class="tab-item">
            <a href="{{ route_locale('about-me') }}" title="{{ __('Chi sono') }}">{{ __('Chi sono') }}</a>
        </li>
        <li class="tab-item">
            <a href="{{ route_locale('contacts') }}" title="{{ __('Contatti') }}">{{ __('Contatti') }}</a>
        </li>
        @include('layouts.common.lang-switch')
    </ul>
</div>
