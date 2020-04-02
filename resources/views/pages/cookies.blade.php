@extends('layouts.default')
@section('content')
    <div class="background-small fill-height first-scroll-height">
        <section class="padding">
            <div class="container">
                <div class="columns">
                    <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto">
                        <h1><span class="elevation">{{ __('Cookie Policy') }}</span></h1>
                        <h2><span class="underline">{{ __('Cosa sono e a cosa servono i cookie') }}</span></h2>
                        <p>
                            {{ __('I cookie sono piccoli file di testo che un sito web può salvare sul tuo dispositivo al fine di erogare i suoi servizi.') }}
                        </p>
                        <h2><span class="underline">{{ __('Quali cookie utilizza questo sito') }}</span></h2>
                        <p>
                            {{ __('Questo sito web utilizza solo cookie tecnici necessari per la fruizione dei servizi erogati:') }}
                        </p>
                        <div class="container">
                            <div class="columns" style="margin-top: 1rem;">
                                <div class="col-3 col-xl-4 col-sm-12">
                                    <label class="privacy-label">XSRF-TOKEN</label>
                                </div>
                                <div class="col-9 col-xl-8 col-sm-12">{{ __('Token univoco associato alla sessione di navigazione per garantire la legittimità della compilazione dei form. Questo cookie viene memorizzato dal dispositivo dell\'utente per le successive due ore dall\'ultimo accesso a una qualsiasi pagina del sito.') }}</div>
                            </div>
                            <div class="columns" style="margin-top: 1rem;">
                                <div class="col-3 col-xl-4 col-sm-12">
                                    <label class="privacy-label">session</label>
                                </div>
                                <div class="col-9 col-xl-8 col-sm-12">{{ __('Token per il mantenimento delle variabili di sessione utili al corretto funzionamento del sito web. Questo cookie viene memorizzato dal dispositivo dell\'utente fino alla chiusura della scheda di navigazione.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
