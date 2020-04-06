@extends('layouts.default')
@section('content')
    <div class="background">
        <section class="fill-height home-first-scroll first-scroll-height">
            <div class="catch-you">
                <div class="image-container" style="width: 100%;">
                    @component('components.async-img', ['src' => asset('/img/logo-colors.svg'), 'ratio' => 0.24, 'style' => 'max-width: 450px; width: 75%; margin: 0 auto; padding: 1rem 0', 'alt' => 'logo'])
                    @endcomponent
                </div>
                <div class="wheel">
                    <div class="fixed-text-wrapper elevation">
                        <h1>{{ __('Automazione digitale') }}</h1>&nbsp;<label>{{ __('per') }}&nbsp;</label>
                    </div>
                    <div class="wheel-slider" data-values="{{
                              '<span class="elevation"><i class="fa-fw fas fa-user"></i> '.__('i cittadini').'</span>'
                            .'|<span class="elevation"><i class="fa-fw fas fa-building"></i> '.__('le imprese').'</span>'
                            .'|<span class="elevation"><i class="fa-fw fas fa-rocket"></i> '.__('le startup').'</span>'
                            .'|<span class="elevation"><i class="fa-fw fas fa-store"></i> '.__('i negozi').'</span>'
                        }}">
                        <span class="wheel-initial-width-placeholder"><span class="elevation"><i class="fa-fw fas fa-building"></i> {{ __('le imprese') }}</span></span>
                    </div>
                </div>
            </div>
        </section>
        <script>
            wheelSlider(document.querySelector('.wheel-slider'));
        </script>
        <section class="fill-height padding vertical-center">
            <div class="container">
                <div class="columns">
                    <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto text-left">
                        <h2><span class="underline opacity-on-scroll">{{ __('Verso un mondo sempre più digitale') }}</span></h2>
                        <p>
                            {!! __('La <q>digital escalation</q> è la trasformazione tecnologica che sempre più rapidamente sta entrando nella vita di tutti i giorni.') !!}
                        </p>
                        <p>
                            {!! __('<strong>Cittadini e imprese sono sempre più connessi</strong> e far parte di questa grande rete di comunicazione digitale offre opportunità di crescita e sviluppo in ogni settore.') !!}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="fill-height padding vertical-center">
            <div class="container">
                <div class="columns">
                    <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto text-right">
                        <h2><span class="underline opacity-on-scroll">{{ __('Dritto al punto') }}</span></h2>
                        <p>
                            {!! __('Software di produttività, gestionali, e-commerce e web app sono alcune tra le <strong>soluzioni</strong> che possiamo sviluppare insieme, <strong>collaborando</strong> per comprendere al meglio le specifiche esigenze della tua attività.<br><br>Ogni cliente ha necessità, budget e tempistiche differenti, per questo è importante studiare una soluzione su misura.') !!}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="fill-height padding vertical-center">
            <div class="container">
                <div class="columns">
                    <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto text-center">
                        <h2><span class="underline opacity-on-scroll">{{ __('Hai un\'idea?') }}</span></h2>
                        <p>
                            {{ __('Se hai un\'idea che richiede una consulenza specialistica puoi contattarmi senza impegno compilando il seguente form o inviandomi un\'email all\'indirizzo riportato di seguito.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div>
                @include('layouts.common.form')
            </div>
        </section>
    </div>
@endsection

