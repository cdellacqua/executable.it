@php
$formInputIndex = 0;
@endphp
<div class="container" style="margin-top: 2em;">
    <div class="columns">
        <form method="post" action="{{ route('contact-me') }}" class="form-horizontal col-12 col-mx-auto form-contact">
            <div class="form-group">
                <div class="col-3 col-sm-12">
                    <label class="form-label" for="input-{{ $formInputIndex }}">Nome *</label>
                </div>
                <div class="col-6 col-sm-12">
                    <input class="form-input" type="text" id="input-{{ $formInputIndex++ }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-3 col-sm-12">
                    <label class="form-label" for="input-{{ $formInputIndex }}">Cognome *</label>
                </div>
                <div class="col-6 col-sm-12">
                    <input class="form-input" type="text" id="input-{{ $formInputIndex++ }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-3 col-sm-12">
                    <label class="form-label" for="input-{{ $formInputIndex }}">Email *</label>
                </div>
                <div class="col-6 col-sm-12">
                    <input class="form-input" type="email" id="input-{{ $formInputIndex++ }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-3 col-sm-12">
                    <label class="form-label" for="input-{{ $formInputIndex }}">Telefono <span style="visibility: hidden;">*</span></label>
                </div>
                <div class="col-6 col-sm-12">
                    <input class="form-input" type="tel" id="input-{{ $formInputIndex++ }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-3 col-sm-12">
                    <label class="form-label" for="input-{{ $formInputIndex }}">Messaggio *</label>
                </div>
                <div class="col-6 col-sm-12">
                    <textarea class="form-input" id="input-{{ $formInputIndex++ }}" placeholder="In quest'area puoi illustrarmi brevemente ciò di cui hai bisogno, sarà mia cura ricontattarti appena possibile per poter approfondire il progetto che vuoi realizzare" rows="8" style="resize: vertical;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-3 col-sm-12"></div>
                <div class="col-6 col-sm-12">
                    <label class="form-switch" style="text-align: justify;">
                        <input type="checkbox" name="privacy" required>
                        <i class="form-icon"></i> Acconsento al trattamento dei dati personali per le finalità di contatto
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-mx-auto" style="margin-top: 1em;">
                    <button class="btn btn-primary input-group-btn btn-lg" type="submit">
                        Invia&nbsp;messaggio&nbsp;<i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 text-center">
                    oppure scrivi a<br>
                    <span class="eaddress tooltip tooltip-top" data-tooltip-copied="Copiato!" data-tooltip-hover="Clicca per copiare" data-tooltip="Clicca per copiare">
                        <img src="/img/eaddress.svg" alt="eaddress" style="height: .925em; width: auto; vertical-align: middle;">
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
