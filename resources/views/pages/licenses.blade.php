@extends('layouts.default')
@section('content')
    <div class="background-small fill-height first-scroll-height vertical-center">
        <section class="padding">
            <div class="container">
                <div class="columns">
                    <div class=" col-6 col-xl-8 col-lg-10 col-sm-12 col-mx-auto">
                        <h1 data-reveal="opacity"><span class="elevation">{{ __('Licenze') }}</span></h1>
                        <h2 data-reveal="opacity"><span class="underline">{{ __('Licenze del software utilizzato per realizzare questo sito') }}</span></h2>
                        <div class="container" data-reveal="opacity">
                            @foreach($licenses as $license)
                                <div class="columns" style="margin-top: 1rem;">
                                    <div class="col-10">
                                        <label class="important-label">{{ $license['name'] }}</label>
                                    </div>
                                    <div class="col-2"><a href="{{ asset($license['assetPath']) }}" title="{{ __('Licenza :nome', ['nome' => $license['name']]) }}" download>{{ $license['license'] }}</a></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
