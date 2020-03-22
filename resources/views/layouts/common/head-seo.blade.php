<?php /** @var \App\Models\SEO $seo */ ?>

<meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />

<meta property="og:type" content="{{ $seo->og_type }}" />
<meta property="og:url" content="{{ $seo->og_url }}" />
<meta property="og:image" content="{{ $seo->og_image }}" />
<meta name="twitter:card" content="{{ $seo->twitter_card }}" />

<meta name="author" content="{{ $seo->author }}" />
<meta name="keywords" content="{{ $seo->keywords }}">
<title>{{ $seo->title }}</title>
<meta name="description" content="{{ $seo->description }}" />

@isset($seo->robots)
    <meta name="robots" content="{{ $seo->robots }}" />
@endisset
