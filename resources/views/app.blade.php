<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title inertia>{{ config('app.name', 'Investron') }}</title>
    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
    <meta name="description" content="Investron offers wealth management centered on you. Discover how we can help manage your wealth from a 360-degree perspective." />
    <meta name="author" content="Bount tech" />
    <meta name="keywords"
        content="Wealth management, asset under management, portfolio management, tax planning, asset diversification" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta property="og:title"
        content="{{ config('app.name') }} - We focus on exceeding expectations, simplifying lives, and helping establish lasting legacies." />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:description"
        content="Investron offers wealth management centered on you. Discover how we can help manage your wealth from a 360-degree perspective." />
    <meta property="og:image" content="{{ asset('images/meta_thumbnail.png') }}" />    
    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon-16x16.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @routes
    @viteReactRefresh
    @vite(['resources/js/app.jsx', "resources/js/Pages/{$page['component']}.jsx"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
