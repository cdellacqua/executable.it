@extends('layouts.default')
@section('content')
    <div class="background-small fill-height first-scroll-height">
        <section class="padding">
            <div class="container">
                <div class="columns">
                    <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto">
                        <h1 data-reveal="opacity"><span class="elevation">{{ __('Privacy Policy') }}</span></h1>
                        <h2 data-reveal="opacity"><span class="underline">{{ __('Titolare del trattamento dei dati') }}</span></h2>
                        <p data-reveal="opacity">
                            {{ __('Il Titolare del trattamento è Carlo Dell\'Acqua.') }}<br>
                            {{ __('Indirizzo e-mail') }}:
                            <span class="eaddress tooltip tooltip-right" data-copy="{{ 'afngHmpmk}|ijdm&a|' }}" data-tooltip-copied="{{ __('Copiato!') }}" data-tooltip-hover="{{ __('Clicca per copiare') }}">
                                <img src="{{ asset('/img/eaddress-info.svg') }}" alt="eaddress" style="height: .925em; width: auto; vertical-align: middle;">
                            </span>
                        </p>
                        <h2 data-reveal="opacity"><span class="underline">{{ __('Dati raccolti') }}</span></h2>
                        <p data-reveal="opacity">
                            {{ __('Questo sito web raccoglie in modalità automatica i seguenti dati:') }}
                        </p>
                        <ul data-reveal="opacity">
                            <li>{{ __('indirizzo IP') }}</li>
                            <li>{{ __('token di sessione') }}</li>
                            <li>{{ __('data e ora di accesso alle pagine') }}</li>
                        </ul>
                        <p data-reveal="opacity">
                            {{ __('Previo inserimento e consenso esplicito da parte dell\'utente il sito può inoltre raccogliere dati personali:') }}
                        </p>
                        <ul data-reveal="opacity">
                            <li>{{ __('nome') }}</li>
                            <li>{{ __('cognome') }}</li>
                            <li>{{ __('indirizzo e-mail') }}</li>
                            <li>{{ __('numero di telefono') }}</li>
                        </ul>
                        <p data-reveal="opacity">
                            {{ __('L\'utente si assume la responsabilità dei dati personali di terzi ottenuti, pubblicati o condivisi mediante questo sito e garantisce di avere il diritto di comunicarli e/o diffonderli, liberando il titolare da qualsiasi responsabilità verso terzi.') }}
                        </p>
                        <h2 data-reveal="opacity"><span class="underline">{{ __('Finalità dei dati raccolti') }}</span></h2>
                        <p data-reveal="opacity">
                            {{ __('I dati raccolti verranno utilizzati per le seguenti finalità:') }}
                        </p>
                        <div class="container" data-reveal="opacity">
                            <div class="columns" style="margin-top: 1rem;margin-bottom: 1rem;">
                                <div class="col-3 col-xl-4 col-sm-12">
                                    <label class="important-label">{{ __('Contatto') }}</label>
                                </div>
                                <div class="col-9 col-xl-8 col-sm-12">{{ __('I dati personali liberamente comunicati dall\'utente verranno utilizzati per un successivo ricontatto telematico o telefonico da parte del titolare del trattamento dei dati.') }}</div>
                            </div>
                            <div class="columns" style="margin-top: 1rem;margin-bottom: 1rem;">
                                <div class="col-3 col-xl-4 col-sm-12">
                                    <label class="important-label">{{ __('Statistica') }}</label>
                                </div>
                                <div class="col-9 col-xl-8 col-sm-12">{{ __('I dati di utilizzo anonimi degli utenti verranno utilizzati al fine di migliorare la qualità del servizio mediante analisi di carattere statistico riguardanti, a titolo esemplificativo e non esaustivo, i contenuti più visitati, i tempi medi delle sessioni di navigazione e i tempi medi di risposta del server.') }}</div>
                            </div>
                        </div>
                        <h2 data-reveal="opacity"><span class="underline">{{ __('Modalità del trattamento') }}</span></h2>
                        <h3 data-reveal="opacity">{{ __('Conservazione e cancellazione') }}</h3>
                        <p data-reveal="opacity">
                            {{ __('I dati saranno mantenuti all\'interno del sistema informatico sino a quando saranno ritenuti utili al soddisfacimento dell\'interesse legittimo del titolare.') }}
                        </p>
                        <p data-reveal="opacity">
                            {{ __('I dati ottenuti sono archiviati all\'interno del territorio nazionale italiano. Il titolare adotta le opportune misure di sicurezza atte a impedirne l\'accesso, la divulgazione, la modifica o la distruzione non autorizzate.') }}
                        </p>
                        <p data-reveal="opacity">
                            {{ __('In qualsiasi momento l\'utente potrà richiedere la copia e/o la cancellazione dei propri dati personali dal sistema scrivendo una e-mail di richiesta alla casella di posta elettronica indicata in questo documento. Con la medesima modalità di comunicazione l\'utente può richiedere la revoca dei consensi per le finalità indicate.') }}
                        </p>
                        <p data-reveal="opacity">
                            {{ __('Al termine del periodo di conservazione, i dati personali saranno cancellati e conseguentemente il diritto di accesso, cancellazione, rettificazione ed il diritto alla portabilità dei dati non potranno più essere esercitati dall\'utente.') }}
                        </p>
                        <h3 data-reveal="opacity">{{ __('Base giuridica del trattamento') }}</h3>
                        <p data-reveal="opacity">
                            {{ __('Il titolare tratta i dati personali relativi all\'utente qualora sussista una delle seguenti condizioni:') }}
                        </p>
                        <ul data-reveal="opacity">
                            <li>{{ __('l\'utente ha fornito consenso esplicito per una o più finalità indicate in fase di comunicazione dei dati') }}</li>
                            <li>{{ __('il trattamento è necessario per adempiere un obbligo legale al quale è soggetto il titolare') }}</li>
                            <li>{{ __('il trattamento è necessario per il perseguimento del legittimo interesse del titolare o di terzi') }}</li>
                        </ul>
                        <h3 data-reveal="opacity">{{ __('Luogo del trattamento') }}</h3>
                        <p data-reveal="opacity">
                            {{ __('I dati saranno trattati presso la sede operativa del titolare o in qualunque altro luogo questi si trovi.') }}
                        </p>
                        <h2 data-reveal="opacity"><span class="underline">{{ __('Diritti dell\'utente') }}</span></h2>
                        <p data-reveal="opacity">
                            {{ __('L\'utente ha il diritto di:') }}
                        </p>
                        <ul data-reveal="opacity">
                            <li>{{ __('revocare qualunque consenso precedentemente concesso') }}</li>
                            <li>{{ __('opporsi al trattamento dei dati qualora questo avvenisse su una base giuridica differente dai consensi espressi') }}</li>
                            <li>{{ __('ricevere una copia dei propri dati personali in un formato strutturato per autoconsultazione e/o per il trasferimento presso altro titolare') }}</li>
                            <li>{{ __('verificare e richiedere la rettificazione dei dati personali comunicati') }}</li>
                            <li>{{ __('richiedere la completa cancellazione dei propri dati personali') }}</li>
                            <li>{{ __('proporre un reclamo presso l\'autorità di controllo della protezione dei dati competente o agire in sede giudiziale') }}</li>
                        </ul>
                        <p data-reveal="opacity">
                            {{ __('I diritti di cui sopra possono essere esercitati dall\'utente inoltrando esplicita richiesta al titolare agli estremi indicati in questo documento. Le richieste saranno evase dal titolare entro un mese dalla ricezione della richiesta.') }}
                        </p>
                        <h2 data-reveal="opacity"><span class="underline">{{ __('Ulteriori informazioni sul trattamento') }}</span></h2>
                        <h4 data-reveal="opacity">{{ __('Difesa in giudizio') }}</h4>
                        <p data-reveal="opacity">
                            {{ __('I dati personali dell\'utente possono essere utilizzati da parte del titolare in giudizio o nelle fasi preparatorie alla sua eventuale instaurazione per la difesa da abusi nell\'utilizzo di questo sito o dei servizi connessi da parte dell\'utente. L\'utente dichiara di essere consapevole che il titolare potrebbe essere obbligato a rivelare i dati per ordine delle autorità pubbliche.') }}
                        </p>
                        <h4 data-reveal="opacity">{{ __('Manutenzione e funzionamento del sistema') }}</h4>
                        <p data-reveal="opacity">
                            {{ __('Per necessità legate al funzionamento del sistema e alla sua manutenzione, questo sito e gli eventuali servizi terzi da esso utilizzati potrebbero raccogliere log di sistema che potrebbero contenere anche dati personali.') }}
                        </p>
                        <h4 data-reveal="opacity">{{ __('Informazioni non contenute in questa Privacy Policy') }}</h4>
                        <p data-reveal="opacity">
                            {{ __('Per richiedere altre informazioni inerenti il trattamento dei dati personali è possibile scrivere al titolare del trattamento utilizzando gli estremi di contatto indicati in questo documento.') }}
                        </p>
                        <h4 data-reveal="opacity">{{ __('Modifiche alla Privacy Policy') }}</h4>
                        <p data-reveal="opacity">
                            {{ __('Il titolare si riserva il diritto di apportare modifiche alla presente Privacy Policy in qualunque momento notificandolo agli utenti su questa pagina e, se possibile, inviando una notifica agli utenti attraverso uno degli estremi di contatto di cui è in possesso. Qualora le modifiche interessino trattamenti la cui base giuridica è il consenso, il titolare provvederà, se necessario, a raccogliere nuovamente il consenso dell\'utente.') }}
                        </p>
                        <h2 data-reveal="opacity"><span class="underline">{{ __('Cookie Policy') }}</span></h2>
                        <p data-reveal="opacity">
                            {{ __('Questo sito utilizza dei cookie, per leggere l\'apposita informativa puoi consultare la') }}
                            <a href="{{ route_locale('cookies') }}" title="{{ __('Cookie Policy') }}">{{ __('pagina dedicata cliccando qui') }}</a>
                        </p>
                    </div>
                </div>
                <div class="columns" data-reveal="opacity">
                    <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto text-right">
                        <small>{{ __('Milano, 2 Aprile 2020') }}</small>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
