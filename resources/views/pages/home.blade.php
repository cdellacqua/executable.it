@extends('layouts.default')
@section('content')
    <section class="first-scroll">
        <svg viewBox="0 0 1000 100">
            <polygon points="0,0 0,100 1000,0">
        </svg>
        <div class="catch-you">
            <!--<img class="img-responsive" style="margin: 0 auto;" src="{{ asset('/img/og-image.png') }}">-->
            <div class="wheel">
                <label>Automazione digitale per&nbsp;</label><div class="wheel-slider" data-values="{{ 'le imprese&nbsp;<i class="fas fa-building"></i>|le startup&nbsp;<i class="fas fa-rocket"></i>|i negozi&nbsp;<i class="fas fa-store"></i>|i cittadini&nbsp;<i class="fas fa-user"></i>' }}"><span class="wheel-initial-width-placeholder">le imprese&nbsp;<i class="fas fa-building"></i></span></div>
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
        <svg viewBox="0 0 50 50">
            <circle r="25" x="25" y="25">
        </svg>
        Insieme possiamo trovare soluzioni che permettano di espandere le attività produttive e l'erogazione di servizi attraverso l'adozione di nuove tecnologie.
    </section>
    <section class="padding">
        Ciò che propongo non sono siti o programmi ma vere e proprie soluzioni realizzate su misura per le esigenze dei miei clienti.<br>
        <i>
            (TODO da riformulare)<br>
            Soluzioni pensate per il cliente tenendo conto dei costi. Evitando overengineering ma mantenendo una struttura
            modulare per l'evoluzione della soluzione in base alle mutevoli esigenze
        </i>
    </section>
    <section>
        <i>TODO: form qui</i>
    </section>
@endsection

