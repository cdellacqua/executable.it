@php
$formInputIndex = 0;
@endphp
<div class="container" style="margin-top: 2em;">
    <div class="columns">
        <form method="post" action="{{ route_locale('contacts') }}" class="form-horizontal col-12 col-md-8 col-sm-12 col-mx-auto form-contact">
            @csrf
            <div class="form-group">
                <div class="col-3 col-md-12 field-name-wrapper">
                    <label class="form-label" for="input-{{ $formInputIndex }}">{{ __('Nome') }} *</label>
                </div>
                <div class="col-6 col-md-12">
                    <input class="form-input" type="text" minlength="2" maxlength="100" id="input-{{ $formInputIndex++ }}" value="{{ old('first_name') }}" name="first_name" required>
                </div>
            </div>
            @error('first_name')
                <div class="form-group error">
                    <div class="col-3 col-md-12 field-name-wrapper"></div>
                    <div class="col-6 col-md-12">{{ $message }}</div>
                </div>
            @enderror
            <div class="form-group">
                <div class="col-3 col-md-12 field-name-wrapper">
                    <label class="form-label" for="input-{{ $formInputIndex }}">{{ __('Cognome') }} *</label>
                </div>
                <div class="col-6 col-md-12">
                    <input class="form-input" type="text" minlength="2" maxlength="100" id="input-{{ $formInputIndex++ }}" value="{{ old('last_name') }}" name="last_name" required>
                </div>
            </div>
            @error('last_name')
                <div class="form-group error">
                    <div class="col-3 col-md-12 field-name-wrapper"></div>
                    <div class="col-6 col-md-12">{{ $message }}</div>
                </div>
            @enderror
            <div class="form-group">
                <div class="col-3 col-md-12 field-name-wrapper">
                    <label class="form-label" for="input-{{ $formInputIndex }}">{{ __('Email') }} *</label>
                </div>
                <div class="col-6 col-md-12">
                    <input class="form-input" type="email" minlength="2" maxlength="100" id="input-{{ $formInputIndex++ }}" value="{{ old('email') }}" name="email" required>
                </div>
            </div>
            @error('email')
                <div class="form-group error">
                    <div class="col-3 col-md-12 field-name-wrapper"></div>
                    <div class="col-6 col-md-12">{{ $message }}</div>
                </div>
            @enderror
            <div class="form-group">
                <div class="col-3 col-md-12 field-name-wrapper">
                    <label class="form-label" for="input-{{ $formInputIndex }}">{{ __('Telefono') }} <span style="visibility: hidden;">*</span></label>
                </div>
                <div class="col-6 col-md-12">
                    <input class="form-input" type="tel" minlength="2" maxlength="100" id="input-{{ $formInputIndex++ }}" value="{{ old('phone') }}" name="phone">
                </div>
            </div>
            @error('phone')
                <div class="form-group error">
                    <div class="col-3 col-md-12 field-name-wrapper"></div>
                    <div class="col-6 col-md-12">{{ $message }}</div>
                </div>
            @enderror
            <div class="form-group">
                <div class="col-3 col-md-12 field-name-wrapper">
                    <label class="form-label" for="input-{{ $formInputIndex }}">{{ __('Messaggio') }} *</label>
                </div>
                <div class="col-6 col-md-12">
                    <textarea class="form-input" id="input-{{ $formInputIndex++ }}" placeholder="{{ __('In quest\'area puoi illustrarmi brevemente ciò di cui hai bisogno, sarà mia cura ricontattarti appena possibile per poter approfondire il progetto che vuoi realizzare') }}" rows="8" style="resize: vertical;" minlength="5" maxlength="5000" name="message" required>{{ old('message') }}</textarea>
                </div>
            </div>
            @error('message')
                <div class="form-group error">
                    <div class="col-3 col-md-12 field-name-wrapper"></div>
                    <div class="col-6 col-md-12">{{ $message }}</div>
                </div>
            @enderror
            <div class="form-group">
                <div class="col-3 col-md-12 field-name-wrapper hide-md">
                    <label class="form-label">*</label>
                </div>
                <div class="col-6 col-md-12">
                    <label class="form-switch" style="text-align: justify;">
                        <input type="checkbox" value="true" name="privacy" required {{ old('privacy') === 'true' ? 'checked' : '' }}>
                        <i class="form-icon"></i> {{ __('Acconsento al trattamento dei dati personali per la') }} <a href="{{ route_locale('privacy') }}" title="{{ __('Privacy Policy') }}" target="_blank">{{ __('finalità di contatto') }}</a> <span class="show-md-inline">*</span>
                    </label>
                </div>
            </div>
            @error('privacy')
                <div class="form-group error">
                    <div class="col-3 col-md-12 field-name-wrapper"></div>
                    <div class="col-6 col-md-12">{{ $message }}</div>
                </div>
            @enderror
            <div class="form-group">
                <div class="col-3 col-md-12 field-name-wrapper hide-md">
                    <small>*</small>
                </div>
                <div class="col-6 col-md-12">
                    <small class="show-md-inline">* </small><small>{{ __('campo obbligatori') }}</small>
                </div>
            </div>
            <div class="form-group">
                <div class="col-mx-auto" style="margin-top: 1em;">
                    <button class="btn btn-primary input-group-btn btn-lg" type="submit" style="white-space: nowrap;">
                        {{ __('Invia messaggio') }} <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 text-center">
                    {{ __('oppure scrivi a') }}<br>
                    <span class="eaddress tooltip tooltip-top" data-copy="{{ 'kizdg&lmddiky}iHmpmk}|ijdm&a|' }}" data-tooltip-copied="{{ __('Copiato!') }}" data-tooltip-hover="{{ __('Clicca per copiare') }}">
                        <img src="{{ asset('/img/eaddress.svg') }}" alt="eaddress" style="height: .925em; width: auto; vertical-align: middle;">
                    </span>
                </div>
            </div>
        </form>
        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    document.querySelector('.form-contact .error').scrollIntoView();
                });
            </script>
        @endif
    </div>
</div>
