@php
$formInputIndex = 0;
@endphp
<div class="container" style="margin-top: 2em;">
    <div class="columns">
        <form method="post" action="{{ route('contact-me') }}" class="form-horizontal col-8 col-xl-10 col-md-12 col-mx-auto form-contact">
            <div class="form-group">
                <div class="col-3 col-sm-12">
                    <label class="form-label" for="input-{{ $formInputIndex }}">Nome</label>
                </div>
                <div class="col-9 col-sm-12">
                    <input class="form-input" type="text" id="input-{{ $formInputIndex++ }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-3 col-sm-12">
                    <label class="form-label" for="input-{{ $formInputIndex }}">Cognome</label>
                </div>
                <div class="col-9 col-sm-12">
                    <input class="form-input" type="text" id="input-{{ $formInputIndex++ }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-3 col-sm-12">
                    <label class="form-label" for="input-{{ $formInputIndex }}">Telefono</label>
                </div>
                <div class="col-9 col-sm-12">
                    <input class="form-input" type="tel" id="input-{{ $formInputIndex++ }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-3 col-sm-12">
                    <label class="form-label" for="input-{{ $formInputIndex }}">Richiesta</label>
                </div>
                <div class="col-9 col-sm-12">
                    <textarea class="form-input" id="input-{{ $formInputIndex }}" placeholder="In quest'area puoi illustrarmi brevemente ciò di cui hai bisogno, sarà mia cura ricontattarti appena possibile per poter approfondire il progetto che vuoi realizzare" rows="8" style="resize: vertical;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-mx-auto">
                    <label class="form-switch">
                        <input type="checkbox" name="privacy" required>
                        <i class="form-icon"></i> Acconsento al trattamento dei dati personali per le finalità di contatto
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-mx-auto" style="margin-top: 1em;">
                    <button class="btn btn-primary input-group-btn btn-lg" type="submit">
                        Invia&nbsp;richiesta&nbsp;<i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
