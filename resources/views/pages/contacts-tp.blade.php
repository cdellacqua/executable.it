@extends('layouts.default')
@section('content')
    <div class="background-small">
        <section class="fill-height padding vertical-center text-center first-scroll-height">
            <div class="container">
                <div class="columns">
                    <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto">
                        <h1 data-reveal="fly-in" data-from="top"><span class="elevation">{{ __('Grazie per avermi contattato') }}</span></h1>
                        <p data-reveal="fly-in" data-from="bottom">
                            {{ __('Cercherò di rispondere quanto prima al tuo messaggio, a presto!') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
