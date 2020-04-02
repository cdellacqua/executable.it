<?php /** @var \App\Models\SEO $seo */ ?>

<meta property="og:type" content="{{ $seo->og_type }}" />
<meta property="og:url" content="{{ $seo->og_url }}" />
<meta property="og:image" content="{{ $seo->og_image }}" />
<meta property="og:image:width" content="{{ $seo->og_image_width }}" />
<meta property="og:image:height" content="{{ $seo->og_image_height }}" />
<meta name="twitter:card" content="{{ $seo->twitter_card }}" />

<meta name="author" content="{{ $seo->author }}" />
<meta name="keywords" content="{{ $seo->keywords }}">
<title>@yield('title', e($seo->title))</title>
<meta name="description" content="{{ $seo->description }}" />

@isset($seo->robots)
    <meta name="robots" content="{{ $seo->robots }}" />
@endisset
