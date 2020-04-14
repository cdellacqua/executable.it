@extends('layouts.default')
@section('content')
    <script src="{{ mix('/js/pages/about-me.js') }}"></script>
    <div class="background-small fill-height first-scroll-height">
        <section class="padding">
            <div class="container">
                <div class="columns">
                    <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto">
                        @component('components.async-img', ['src' => asset('/img/me.jpg'), 'ratio' => 1, 'class' => 'photo-container', 'round' => true, 'alt' => 'me', 'data' => ['reveal' => 'fly-in', 'from' => 'right']])
                        @endcomponent
                        <h1 data-reveal="opacity"><span class="elevation">{{ __('Chi sono?') }}</span></h1>
                        <h2 data-reveal="fly-in" data-from="bottom"><span class="underline">{{ __('Carlo Dell\'Acqua: sviluppatore multipiattaforma') }}</span></h2>
                        <p data-reveal="fly-in" data-from="bottom">
                            {{ __('Ho avuto esperienze in ambito di applicativi Desktop e Mobile, ho sperimentato con dispositivi embedded e mi sono dilettato in progetti basati su microcontrollori, fino ad arrivare all\'ambito Web che copre ormai la gran parte dei miei progetti.') }}
                        </p>
                        <div class="socials-container">
                            <div class="columns">
                                <div class="col-6 column" data-reveal="fly-in" data-from="left">
                                    <a class="btn d-block" title="{{ __('Profilo GitHub') }}" target="_blank" rel="noopener" href="https://github.com/cdellacqua"><i class="fab fa-github-square"></i>&nbsp;{{ __('Profilo GitHub') }}</a>
                                </div>
                                <div class="col-6 column" data-reveal="fly-in" data-from="right">
                                    <a class="btn d-block" title="{{ __('Profilo LinkedIn') }}" target="_blank" rel="noopener" href="https://www.linkedin.com/in/carlo-dell-acqua/"><i class="fab fa-linkedin"></i>&nbsp;{{ __('Profilo LinkedIn') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="padding">
            <div class="container">
                <div class="columns">
                    <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto">
                        <h2 data-reveal="fly-in" data-from="bottom"><span class="underline">{{ __('Lo sviluppo web') }}</span></h2>
                        <p data-reveal="fly-in" data-from="bottom">
                            {{ __('Da quando ho cominciato a sviluppare con le tecnologie Web ho avuto modo di testare differenti linguaggi, librerie e framework, a partire da JavaScript e CSS puro in una fase più didattica, passando per i classici jQuery e Bootstrap, fino a iniziare uno sviluppo più strutturato attraverso framework frontend quali React e Angular, insieme all\'utilizzo di Webpack per progetti in cui è necessario maggiore controllo.') }}
                        </p>
                        <p data-reveal="fly-in" data-from="bottom">
                            {{ __('Parallelamente allo studio dello sviluppo Frontend ho iniziato a formarmi sulle tecnologie di Backend, al fine di poter realizzare Web App complete in soluzioni Client Side Rendering e Server Side Rendering.') }}
                        </p>
                        <p data-reveal="fly-in" data-from="bottom">
                            {{ __('Ad oggi mi occupo di proporre soluzioni pensate su misura per le esigenze specifiche di ogni cliente, cercando ove possibile di adottare tecnologie e metodologie rodate e robuste, tenendo sempre in considerazione le esigenze e il target a cui ci si rivolge.') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="padding" style="margin-bottom: 3em;">
            <div class="container">
                <div class="columns">
                    <div class="timeline col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto">
                        <h2 data-reveal="fly-in" data-from="bottom"><span class="underline">{{ __('Milestones') }}</span></h2>
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
                                            <p class="tile-subtitle" data-reveal="fly-in" data-from="right">{{ $item->date->formatLocalized('%B %Y') }}</p>
                                            <h3 class="tile-title" data-reveal="fly-in" data-from="right"><span class="underline">{{ $item->title }}</span></h3>
                                            <p class="tile-text" data-reveal="fly-in" data-from="right">
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
