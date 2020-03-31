@extends('layouts.default')
@section('content')
    <div class="background-small">
        <section class="fill-height padding vertical-center text-center">
            <div class="container">
                <div class="columns">
                    <div class="col-8 col-sm-12 col-mx-auto">
                        <h1><span class="elevation">{{ __('Grazie per avermi contattato') }}</span></h1>
                        <p>
                            {{ __('Cercherò di rispondere quanto prima al tuo messaggio, a presto!') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
