@extends('layouts.default')
@section('content')
    <section class="first-scroll">
        <svg viewBox="0 0 1000 100">
            <polygon points="0,0 0,100 1000,0">
        </svg>
        <div class="catch-you">
            <div class="image-container show-lg" style="width: 100%;">
                @component('components.async-img', ['src' => asset('/img/logo-colors.svg').'?v4', 'ratio' => 0.24, 'style' => 'max-width: 300px; width: 75%; margin: 0 auto; padding: 1rem 0'])
                @endcomponent
            </div>
            <div class="wheel">
                <div class="fixed-text-wrapper">
                    <h1>Automazione digitale</h1>&nbsp;<label>per&nbsp;</label>
                </div>
                <div class="wheel-slider" data-values="{{ '<i class="fa-fw fas fa-building"></i> le imprese|<i class="fa-fw fas fa-rocket"></i> le startup|<i class="fa-fw fas fa-store"></i> i negozi|<i class="fa-fw fas fa-user"></i> i cittadini' }}"><span class="wheel-initial-width-placeholder">le imprese&nbsp;<i class="fa-fw fas fa-building"></i></span></div>
            </div>
        </div>
        <svg viewBox="0 0 1000 100">
            <polygon points="0,100 1000,100 1000,0">
        </svg>
    </section>
    <script>
        wheelSlider(document.querySelector('.wheel-slider'));
    </script>
    <section class="padding">
        <svg viewBox="0 0 1000 100">
            <polygon points="0,0 0,100 1000,0">
        </svg>
        <h2>Verso un mondo sempre più digitale</h2>
        <p>
            La <q>digital escalation</q> è la trasformazione tecnologica che sempre più rapidamente sta entrando
            nella vita di tutti i giorni.<br><br>
            <strong>Cittadini e imprese sono sempre più connessi</strong> e far parte di questa grande rete
            di comunicazione digitale offre opportunità di crescita e sviluppo in ogni settore.
        </p>
        <svg viewBox="0 0 1000 100">
            <polygon points="0,100 1000,100 1000,0">
        </svg>
    </section>

    <section class="padding">
        <h2>Dritto al punto</h2>
        <p>
            Software di produttività, gestionali, e-commerce e web app sono alcune tra le <strong>soluzioni</strong> che possiamo sviluppare insieme,
            <strong>collaborando</strong> per comprendere al meglio le specifiche esigenze della tua attività.<br>
            <br>
            Ogni cliente ha necessità, budget e tempistiche differenti, per questo è importante studiare una soluzione su misura.<br>
            <br>
            <br>
            Se hai un'idea che richiede una consulenza specialistica puoi contattarmi senza impegno compilando il seguente form:
        </p>
        <div>
            @include('layouts.common.form')
        </div>
    </section>
@endsection

