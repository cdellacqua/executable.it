@extends('layouts.default')
@section('content')
    <p>
        Sono uno sviluppatore multipiattaforma.<br>
        Ho avuto esperienze in ambito di applicativi Desktop e Mobile fino ad arrivare all'ambito Web che copre ormai la gran parte dei miei progetti.<br>
        <br>
        Da quando ho iniziato lo sviluppo Web ho avuto modo di testare differenti tecnologie, a partire da JavaScript e CSS puro in una fase più didattica,
        passando per i classici jQuery e Bootstrap, fino a iniziare uno sviluppo più strutturato attraverso framework frontend quali React e Angular,
        insieme all'utilizzo di Webpack per progetti in cui è necessario maggiore controllo.<br>
        <br>
        Parallelamente allo studio dello sviluppo Frontend ho iniziato a formarmi sulle tecnologie di Backend, al fine di poter realizzare Web App complete
        in soluzioni Client Side Rendering e Server Side Rendering.<br>
        <br>
        Ad oggi mi occupo di proporre soluzioni pensate su misura per le esigenze specifiche di ogni cliente, cercando ove possibile di adottare
        tecnologie e metodologie rodate e robuste, tenendo sempre in considerazione le esigenze e il target a cui ci si rivolge.<br>
    </p>
    <div class="timeline">
        @php
        $date = \Carbon\Carbon::create(2020, 3)->formatLocalized('%B %Y');
        @endphp
        <div class="timeline-item">
            <div class="timeline-left">
                <span class="timeline-icon icon-lg" style="padding: 2px">
                    <img class="img-responsive" src="{{ asset('/img/logo-transparent-symbol-white.png') }}">
                </span>
            </div>
            <div class="timeline-content">
                <div class="tile">
                    <div class="tile-content">
                        <p class="tile-subtitle">{{ $date }}</p>
                        <p class="tile-title">Nasce EXECUTABLE</p>
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
                        <p class="tile-title">Laurea Triennale in Ingegneria Informatica</p>
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
                        <p class="tile-title">Avvio di carriera in TCommunication Srl</p>
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
                        <p class="tile-title">Diploma in Informatica e Telecomunicazioni</p>
                        <p class="tile-text">

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
