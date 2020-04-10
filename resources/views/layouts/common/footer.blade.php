<strong style="color: white;">Executable</strong><br>
<small>{{ __('di Carlo Dell\'Acqua') }} &ndash; {{ __('P.IVA IT 11238940966') }}</small><br>
<small>{{ __('Milano') }} &ndash; &copy;&nbsp;{{ date('Y') }}</small><br>
@if ($links ?? true)
    <small><a href="{{ route_locale('cookies') }}" title="{{ __('Cookie Policy') }}">{{ __('Cookie Policy') }}</a> | <a href="{{ route_locale('privacy') }}" title="{{ __('Privacy Policy') }}">{{ __('Privacy Policy') }}</a> | <a href="{{ route_locale('licenses') }}" title="{{ __('Licenze') }}">{{ __('Licenze') }}</a></small>
@endif
