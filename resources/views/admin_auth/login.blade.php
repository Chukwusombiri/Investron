<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css'])
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon-16x16.png') }}">
    <title>{{ config('app.name') }} | Sign-in your account</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('myassets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('myassets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="{{ asset('myassets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
</head>

<body class="frank-regular antialiased bg-primary-50">
    <div class="container sticky top-0 z-sticky">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3 flex-0">
                <!-- Navbar -->
                <nav
                    class="absolute top-0 left-0 right-0 z-30 flex items-center px-4 py-2 m-6 mb-0 shadow-sm rounded-xl bg-white/80 backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-between">
                    <div class="w-full mx-auto flex items-center justify-between flex-wrap">
                        <a class="text-2xl mr-4 whitespace-nowrap font-bold text-primary-500 lg:ml-0"
                            href="{{ route('guest_home') }}">
                            ROLLINGSGROUP
                        </a>
                        <button navbar-trigger
                            class="px-3 py-1 ml-2 leading-none transition-all ease-in-out bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-lg lg:hidden"
                            type="button" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span
                                class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6 h-6 bg-none">
                                <span bar1
                                    class="w-5.5 rounded-xs relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                                <span bar2
                                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                                <span bar3
                                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                            </span>
                        </button>
                        <div navbar-menu
                            class="transition-all duration-500 ease lg-max:overflow-hidden lg-max:max-h-0 basis-full lg:flex lg:basis-auto">
                            <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">
                                <li>
                                    <a class="flex items-center px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2"
                                        aria-current="page" href="{{ route('guest_home') }}">
                                        <i class="mr-1 fa fa-home opacity-60"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2"
                                        aria-current="page" href="{{ route('admin.dashboard') }}">
                                        <i class="mr-1 fa fa-chart-pie opacity-60"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="block px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2"
                                        href="{{ route('admin.admin_profile') }}">
                                        <i class="mr-1 fa fa-user opacity-60"></i>
                                        Profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <main class="mt-14 md:mt-10 transition-all duration-200 ease-in-out">
        <div class="relative flex items-center justify-center min-h-screen p-0 overflow-hidden bg-center bg-cover dark:bg-gray-950">
            <div
                class="w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py-4 rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0">
                        <h4 class="font-bold text-center">Sign In</h4>
                        <p class="w-full text-center">Enter your email and password to sign in</p>
                    </div>
                    @if (session('status'))
                        <div class="p-6 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ session('status') }}
                        </div>
                    @endif
                    <x-validation-errors class="p-4" />
                    <div class="flex-auto p-6">
                        <form role="form" method="POST" action="{{ route('admin.login.authenticate') }}">
                            @csrf
                            <div class="mb-4">
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                                    class="appearance-none text-sm leading-5.6 ease block w-full rounded-lg border border-gray-300 bg-primary-50 bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:ring-0 focus:border-blue-500 focus:outline-none" />
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password" value="{{ old('email') }}" placeholder="Password"
                                    class="appearance-none text-sm leading-5.6 ease block w-full rounded-lg border border-gray-300 bg-primary-50 bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:ring-0 focus:border-blue-500 focus:outline-none" />
                            </div>
                            <div class="flex items-center pl-12 mb-0.5 text-left min-h-6">
                                <input id="rememberMe" name="remember"
                                    class="mt-0.5 rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-zinc-700/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
                                    type="checkbox" />
                                <label class="ml-2 font-normal cursor-pointer select-none text-sm text-slate-700"
                                    for="rememberMe">Remember me</label>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="bg-vibrant uppercase text-xs tracking-wider inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs ease-in shadow-md"
                                    >Sign in</button>
                            </div>
                        </form>
                        <div class="flex items-center justify-center mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('admin.password.forgot') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-12">
        <div class="container">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-shrink-0 w-full max-w-full mx-auto text-center lg:flex-0">
                    <a href="{{ route('guest_home') }}" target="_blank"
                        class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12">Home</a>
                    <a href="{{ route('contact') }}" target="_blank"
                        class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Contact</a>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
                    <p class="mb-0 text-slate-400">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        {{ config('app.name') }}
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
<!-- plugin for scrollbar  -->
<script src="{{ asset('myassets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('myassets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>

</html>
