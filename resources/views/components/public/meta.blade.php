@props([
    'title' => 'Pluginy na míru pro WordPress a WooCommerce',
    'description' => 'Vývoj vlastních pluginů, optimalizace a automatizace pro WordPress a WooCommerce.',
    'canonical' => request()->fullUrl(),
    'image' => asset('img/og-default.png'),
    'url' => request()->fullUrl(),
])


<title>{{ $title }} | PluginyOnline.cz</title>
<meta name="description" content="{{ $description }}">
<link rel="canonical" href="{{ $canonical }}">

{{-- Open Graph --}}
<meta property="og:type" content="website">
<meta property="og:site_name" content="PluginyOnline.cz">
<meta property="og:title" content="{{ $title }} | PluginyOnline.cz">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:url" content="{{ $url }}">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }} | PluginyOnline.cz">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">
