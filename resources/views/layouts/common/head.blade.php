<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="theme-color" content="#000000" />
<link rel="icon" type="image/png" href="{{ asset('/favicon.png') }}">

@include('layouts.common.head-seo')

<link rel="stylesheet" href="{{ mix('/plugins/spectre-0.5.8/spectre.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free-5.12.1-web/fontawesome.css') }}">

<script src="{{ mix('/js/app.js') }}"></script>
<link rel="stylesheet" href="{{ mix('/css/app.css') }}">

@if(config('app.env') == 'local')
    <script src="http://localhost:35729/livereload.js"></script>
@endif
