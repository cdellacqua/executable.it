@extends('layouts.default')
@section('content')
    <script src="{{ mix('/js/pages/about-me.js') }}"></script>
    <div class="background-small">
        <section class="padding">
            <div class="container">
                <div class="columns">
                    <div class="col-8 col-sm-12 col-mx-auto">
                        <h1><span class="elevation">{{ __('Chi sono?') }}</span></h1>
                        <h2><span class="underline">{{ __('Sono uno sviluppatore multipiattaforma') }}</span></h2>
                        <p>
                            {{ __('Ho avuto esperienze in ambito di applicativi Desktop e Mobile, ho sperimentato con dispositivi embedded e mi sono dilettato in progetti basati su microcontrollori, fino ad arrivare all\'ambito Web che copre ormai la gran parte dei miei progetti.') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="padding">
            <div class="container">
                <div class="columns">
                    <div class="col-8 col-sm-12 col-mx-auto">
                        <h2><span class="underline">{{ __('Lo sviluppo web') }}</span></h2>
                        <p>
                            {{ __('Da quando ho cominciato a sviluppare con le tecnologie Web ho avuto modo di testare differenti linguaggi, librerie e framework, a partire da JavaScript e CSS puro in una fase più didattica, passando per i classici jQuery e Bootstrap, fino a iniziare uno sviluppo più strutturato attraverso framework frontend quali React e Angular, insieme all\'utilizzo di Webpack per progetti in cui è necessario maggiore controllo.') }}
                        </p>
                        <p>
                            {{ __('Parallelamente allo studio dello sviluppo Frontend ho iniziato a formarmi sulle tecnologie di Backend, al fine di poter realizzare Web App complete in soluzioni Client Side Rendering e Server Side Rendering.') }}
                        </p>
                        <p>
                            {{ __('Ad oggi mi occupo di proporre soluzioni pensate su misura per le esigenze specifiche di ogni cliente, cercando ove possibile di adottare tecnologie e metodologie rodate e robuste, tenendo sempre in considerazione le esigenze e il target a cui ci si rivolge.') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="padding">
            <div class="container">
                <div class="columns">
                    <div class="timeline col-8 col-xl-10 col-md-12 col-mx-auto">
                        <h2><span class="underline">{{ __('Milestones') }}</span></h2>
                        @foreach($timeline as $item)
                            <div class="timeline-item">
                                <div class="timeline-left">
                                    <span class="timeline-icon icon-lg" style="padding: 3px;">
                                        {!! $item->icon !!}
                                    </span>
                                </div>
                                <div class="timeline-content">
                                    <div class="tile">
                                        <div class="tile-content">
                                            <p class="tile-subtitle">{{ $item->date->formatLocalized('%B %Y') }}</p>
                                            <h3 class="tile-title"><span class="underline">{{ $item->title }}</span></h3>
                                            <p class="tile-text">
                                                {{ $item->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
