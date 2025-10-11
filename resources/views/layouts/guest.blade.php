<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
    <meta name="description"
        content="Mazmoves Ltd: Affordable and state-of-the-art logistics services in the UK, specializing in moving goods and household items with precision and care. Your trusted partner for smooth, reliable, and cost-effective relocations." />
    <meta name="author" content="CHISOM OKWUOSA" />
    <meta name="keywords"
        content="logistics company UK, affordable moving services UK, household moving UK, goods transportation UK, reliable movers UK, meticulous moving service, affordable relocation, UK movers, household item relocation, UK goods transport, furniture moving services, office relocation UK, UK movers affordable, careful movers UK, affordable household transport, logistics services UK, professional moving company UK, reliable transportation services, UK home movers, careful goods movers" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta property="og:title"
        content="Mazmoves Ltd - Affordable and reliable Logistics and Moving Services in the UK" />
    <meta property="og:site_name" content="Mazmoves Ltd" />
    <meta property="og:url" content="https://mazmoves.com/" />
    <meta property="og:description"
        content="Mazmoves Ltd provides affordable, reliable logistics and household moving services across the UK. We specialize in moving goods with precision and care, ensuring smooth, reliable, and cost-effective relocations." />
    <meta property="og:image" content="{{ asset('images/service2.jpg') }}" />
    <title>{{ config('app.name') }}</title>
    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon-16x16.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hedvig+Letters+Serif:opsz@12..24&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>

<body>
    <div class="frank-regular text-gray-900 antialiased" 
    style="background-image: url('/images/guest-bg.jpg');background-repeat:no-repeat; background-size: cover;">
        <div class="min-h-screen flex md:items-center justify-center bg-primary-50/50 py-12 md:py-16 px-4">
            <div class="w-full md:max-w-xl mx-auto flex flex-col items-center">
                <h1 class='h2 font-semibold tracking-wider'><a href="/" class="text-primary-500 no-underline">RollingsGroup</a></h1>

                {{ $slot }}
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>
