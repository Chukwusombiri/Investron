<!DOCTYPE html>
<html lang="en">

<head>        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
    <meta name="description" content="{{config('app.name')}} offers wealth management centered on you. Discover how we can help manage your wealth from a 360-degree perspective." />
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
        content="{{config('app.name')}} offers wealth management centered on you. Discover how we can help manage your wealth from a 360-degree perspective." />
    <meta property="og:image" content="{{ asset('images/meta_thumbnail.png') }}" />    
    <title>{{ config('app.name') }} | Client portfolio</title>

    <!-- Favicon Icon -->
    <link rel="icon" href="{{asset('images/favicon.ico')}}">     
     <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/images/favicon-16x16.png')}}">

    <!--     Fonts and icons     -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hedvig+Letters+Serif:opsz@12..24&display=swap" rel="stylesheet">    
    
    <!-- CSS Styles -->
    <link href="{{ asset('myassets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('myassets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css">
   
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>            
    
    @vite(['resources/css/app.css'])
    <link href="{{ asset('myassets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />            
    <!-- Livewire Styling -->            
    @livewireStyles       
</head>

<body
    class="relative m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-secondary dark:hidden min-h-75"></div>
    <x-banner />
    <!-- sidenav  -->
    <x-sidebar />
    <!-- end sidenav -->

    <main class="frank-regular relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        {{ $slot }}
    </main>    
    <!-- plugin for scrollbar  -->
    <script src="{{ asset('myassets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>    
    @stack('scripts')
    <!-- main script file  -->
    <script src="{{asset('myassets/js/argon-dashboard-tailwind.js?v=1.0.1')}}" async></script>
    @livewireScripts
</body>
</html>
