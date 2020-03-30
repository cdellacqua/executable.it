@extends('layouts.default')
@section('content')
    <script src="{{ mix('/js/pages/home.js') }}"></script>
    <div class="background">
        <section class="fill-height first-scroll">
            <div class="catch-you">
                <div class="image-container show-lg" style="width: 100%;">
                    @component('components.async-img', ['src' => asset('/img/logo-colors.svg').'?v4', 'ratio' => 0.24, 'style' => 'max-width: 300px; width: 75%; margin: 0 auto; padding: 1rem 0'])
                    @endcomponent
                </div>
                <div class="wheel">
                    <div class="fixed-text-wrapper elevation">
                        <h1>Automazione digitale</h1>&nbsp;<label>per&nbsp;</label>
                    </div>
                    <div class="wheel-slider" data-values="{{ '<i class="fa-fw fas fa-user"></i> i cittadini|<i class="fa-fw fas fa-building"></i> le imprese|<i class="fa-fw fas fa-rocket"></i> le startup|<i class="fa-fw fas fa-store"></i> i negozi' }}"><span class="wheel-initial-width-placeholder">le imprese&nbsp;<i class="fa-fw fas fa-building"></i></span></div>
                </div>
            </div>
        </section>
        <script>
            wheelSlider(document.querySelector('.wheel-slider'));
        </script>
        <section class="fill-height padding vertical-center">
            <div class="container">
                <div class="columns">
                    <div class="col-8 col-sm-12 col-mx-auto text-left">
                        <h2><span class="underline opacity-on-scroll">Verso un mondo sempre più digitale</span></h2>
                        <p>
                            La <q>digital escalation</q> è la trasformazione tecnologica che sempre più rapidamente sta entrando
                            nella vita di tutti i giorni.
                        </p>
                        <p>
                            <strong>Cittadini e imprese sono sempre più connessi</strong> e far parte di questa grande rete
                            di comunicazione digitale offre opportunità di crescita e sviluppo in ogni settore.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="fill-height padding vertical-center">
            <div class="container">
                <div class="columns">
                    <div class="col-8 col-sm-12 col-mx-auto text-right">
                        <h2><span class="underline opacity-on-scroll">Dritto al punto</span></h2>
                        <p>
                            Software di produttività, gestionali, e-commerce e web app sono alcune tra le <strong>soluzioni</strong> che possiamo sviluppare insieme,
                            <strong>collaborando</strong> per comprendere al meglio le specifiche esigenze della tua attività.<br>
                            <br>
                            Ogni cliente ha necessità, budget e tempistiche differenti, per questo è importante studiare una soluzione su misura.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="fill-height padding vertical-center">
            <div class="container">
                <div class="columns">
                    <div class="col-8 col-sm-12 col-mx-auto text-center">
                        <h2><span class="underline opacity-on-scroll">Hai un'idea?</span></h2>
                        <p>
                            Se hai un'idea che richiede una consulenza specialistica puoi contattarmi senza impegno compilando il seguente form:
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

