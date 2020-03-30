@extends('layouts.default')
@section('content')
    <section class="fill-height padding vertical-center">
        <div class="container">
            <div class="columns">
                <div class="col-8 col-sm-12 col-mx-auto text-center">
                    <h1><span class="elevation">Contattami</span></h1>
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
@endsection
