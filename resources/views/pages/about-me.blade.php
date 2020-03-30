@extends('layouts.default')
@section('content')
    <script src="{{ mix('/js/pages/about-me.js') }}"></script>
    <section class="padding">
        <div class="container">
            <div class="columns">
                <div class="col-8 col-sm-12 col-mx-auto">
                    <h1><span class="elevation">Chi sono?</span></h1>
                    <h2><span class="underline">Sono uno sviluppatore multipiattaforma</span></h2>
                    <p>
                        Ho avuto esperienze in ambito di applicativi Desktop e Mobile, ho sperimentato con dispositivi embedded e mi sono dilettato in progetti basati su microcontrollori, fino ad arrivare all'ambito Web che copre ormai la gran parte dei miei progetti.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="padding">
        <div class="container">
            <div class="columns">
                <div class="col-8 col-sm-12 col-mx-auto">
                    <h2><span class="underline">Lo sviluppo web</span></h2>
                    <p>
                        Da quando ho cominciato a sviluppare con le tecnologie Web ho avuto modo di testare differenti linguaggi, librerie e framework, a partire da JavaScript e CSS puro in una fase più didattica,
                        passando per i classici jQuery e Bootstrap, fino a iniziare uno sviluppo più strutturato attraverso framework frontend quali React e Angular,
                        insieme all'utilizzo di Webpack per progetti in cui è necessario maggiore controllo.<br>
                        <br>
                        Parallelamente allo studio dello sviluppo Frontend ho iniziato a formarmi sulle tecnologie di Backend, al fine di poter realizzare Web App complete
                        in soluzioni Client Side Rendering e Server Side Rendering.<br>
                        <br>
                        Ad oggi mi occupo di proporre soluzioni pensate su misura per le esigenze specifiche di ogni cliente, cercando ove possibile di adottare
                        tecnologie e metodologie rodate e robuste, tenendo sempre in considerazione le esigenze e il target a cui ci si rivolge.<br>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="padding">
        <div class="container">
            <div class="columns">
                <div class="timeline col-8 col-xl-10 col-md-12 col-mx-auto">
                    <h2><span class="underline">Milestones</span></h2>
                    @php
                        $date = \Carbon\Carbon::create(2020, 4)->formatLocalized('%B %Y');
                    @endphp
                    <div class="timeline-item">
                        <div class="timeline-left">
                            <span class="timeline-icon icon-lg" style="padding: 3px;">
                                <img alt="x" onerror="this.style.display = 'none'; this.parentElement.style.padding = ''; this.nextElementSibling.style.display = ''" style="display: block; height:auto; width: 100%;" src="{{ asset('/img/logo-symbol-white.svg') }}">
                                <i class="fas fa-cog" style="display: none;"></i>
                            </span>
                        </div>
                        <div class="timeline-content">
                            <div class="tile">
                                <div class="tile-content">
                                    <p class="tile-subtitle">{{ $date }}</p>
                                    <h3 class="tile-title"><span class="underline">Nasce EXECUTABLE</span></h3>
                                    <p class="tile-text">
                                        Inizia la mia avventura come Programmatore Freelance, con forti prospettive di crescita e con l'obiettivo di
                                        rendere questa mia attività un'azienda strutturata e prospera.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $date = \Carbon\Carbon::create(2019, 9)->formatLocalized('%B %Y')
                    @endphp
                    <div class="timeline-item">
                        <div class="timeline-left">
                            <span class="timeline-icon icon-lg"><i class="fas fa-graduation-cap"></i></span>
                        </div>
                        <div class="timeline-content">
                            <div class="tile">
                                <div class="tile-content">
                                    <p class="tile-subtitle">{{ $date }}</p>
                                    <h3 class="tile-title"><span class="underline">Laurea Triennale in Ingegneria Informatica</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $date = \Carbon\Carbon::create(2018, 3)->formatLocalized('%B %Y')
                    @endphp
                    <div class="timeline-item">
                        <div class="timeline-left">
                            <span class="timeline-icon icon-lg"><i class="fas fa-briefcase"></i></span>
                        </div>
                        <div class="timeline-content">
                            <div class="tile">
                                <div class="tile-content">
                                    <p class="tile-subtitle">{{ $date }}</p>
                                    <h3 class="tile-title"><span class="underline">Avvio di carriera in TCommunication Srl</span></h3>
                                    <p class="tile-text">
                                        Parallelamente alla carriera accademica vengo assunto come sviluppatore IT, iniziando ad applicare le
                                        conoscenze acquisite negli anni per la realizzazione di prodotti digitali,
                                        da applicativi Desktop per la produttività a Web App e servizi REST per la gestione dei progetti aziendali.<br>
                                        Durante questo periodo mi appassiono al mondo dello sviluppo Web, cercando di adottare
                                        tecnologie moderne ed efficaci per la l'implementazione dei più svariati progetti.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $date = \Carbon\Carbon::create(2016, 07)->formatLocalized('%B %Y')
                    @endphp
                    <div class="timeline-item">
                        <div class="timeline-left">
                            <span class="timeline-icon icon-lg"><i class="fas fa-graduation-cap"></i></span>
                        </div>
                        <div class="timeline-content">
                            <div class="tile">
                                <div class="tile-content">
                                    <p class="tile-subtitle">{{ $date }}</p>
                                    <h3 class="tile-title"><span class="underline">Diploma in Informatica e Telecomunicazioni</span></h3>
                                    <p class="tile-text">

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
