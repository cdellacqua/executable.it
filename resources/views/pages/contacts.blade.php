@extends('layouts.default')
@section('content')
    <div class="background-small">
        <section class="fill-height padding vertical-center">
            <div class="container">
                <div class="columns">
                    <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto">
                        <h1><span class="elevation">{{ __('Contatti') }}</span></h1>
                        <p>
                            {{ __('Se hai un\'idea che richiede una consulenza specialistica puoi contattarmi senza impegno compilando il seguente form o inviandomi un\'email all\'indirizzo riportato di seguito') }}
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
