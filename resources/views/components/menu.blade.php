<div x-data="{ open: false }" class="futura-medium bg-primary-white shadow z-10 w-full relative" id="menu">
    <div class="h-16 lg:h-20 flex flex-nowrap justify-center px-4 items-center">
        <div class="w-full max-w-8xl mx-auto flex items-center justify-between flex-nowrap">
            <div class="flex">
                <a href="{{ route('guestHome') }}">
                    <x-application-logo class="block h-9 w-auto" />
                </a>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-dropdown>
                    <x-slot name="trigger">
                        <x-nav-link href="javascript:void()" :active="request()->routeIs('managedInvesting')" class="">
                            {{ __('Managed investing') }}
                        </x-nav-link>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-content action="{{ route('managedInvesting') }}">
                            <x-slot name="title">Managed Investing</x-slot>
                            <x-slot name="description">Let's build your custom portfolio that meant for long-term
                                growth. Plus get expert
                                advice whenever
                                you need.</x-slot>
                            <x-slot name="listTitle">Portfolios</x-slot>
                            <x-slot name="listItems">
                                <li class="py-3"><a href="{{ route('managedInvesting') }}" class="hover:underline">Managed Investing</a></li>
                                <li class="py-3"><a href="{{ route('managedInvesting').'#features' }}" class="hover:underline">Features of Managed investing</a></li>
                                <li class="py-3"><a href="{{ route('managedInvesting').'#plans' }}" class="hover:underline">Socially responsible portfolio</a></li>
                                <li class="py-3"><a href="{{ route('managedInvesting').'#faqs' }}" class="hover:underline">Frequently asked questions</a></li>
                            </x-slot>
                        </x-dropdown-content>
                    </x-slot>
                </x-nav-dropdown>
                <x-nav-link href="{{route('pricing')}}" :active="request()->routeIs('pricing')">
                    {{ __('Pricing') }}
                </x-nav-link>
                <x-nav-dropdown>
                    <x-slot name="trigger">
                        <x-nav-link href="javascript:void()" :active="request()->routeIs('about')" class="">
                            {{ __('Company') }}
                        </x-nav-link>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-content action="{{ route('about') }}">
                            <x-slot name="title">{{config('app.name')}}</x-slot>
                            <x-slot name="description">
                                We are a full-fledged investment company aimed at providing all possible options to a successful investment. Whether
                                you are a seasoned investor or a newbie, we've got your back.
                            </x-slot>
                            <x-slot name="listTitle">Company pages</x-slot>
                            <x-slot name="listItems">
                                <li class="py-3"><a href="{{ route('about') }}" class="hover:underline">About us</a></li>
                                <li class="py-3"><a href="{{ route('about').'#team' }}" class="hover:underline">Executives and directors</a></li>
                                <li class="py-3"><a href="{{ route('reviews') }}" class="hover:underline">Testimonial from clients</a></li>
                            </x-slot>
                        </x-dropdown-content>
                    </x-slot>
                </x-nav-dropdown>                                
                <x-nav-dropdown>
                    <x-slot name="trigger">
                        <x-nav-link href="javascript:void()" :active="request()->routeIs('knowledge')" class="">
                            {{ __('Support and tools') }}
                        </x-nav-link>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-content action="{{ route('contact') }}">
                            <x-slot name="title">Support and tools</x-slot>
                            <x-slot name="description">
                                We are always eager to render assistance to our clients, through our numerous support channels. Also, our knowledge base contains
                                informations on how to navigate our platform with ease whether a beginner or seasoned investor, you will find 
                                it useful.
                            </x-slot>
                            <x-slot name="listTitle">Supports and tools</x-slot>
                            <x-slot name="listItems">
                                <li class="py-3"><a href="{{ route('contact') }}" class="hover:underline">Contact us</a></li>
                                <li class="py-3"><a href="{{ route('projector') }}" class="hover:underline">ROI Projector</a></li>
                                <li class="py-3"><a href="{{ route('knowledge') }}" class="hover:underline">knowledge base</a></li>
                                <li class="py-3"><a href="{{ route('knowledge').'#faqs' }}" class="hover:underline">Frequently asked questions</a></li>
                            </x-slot>
                        </x-dropdown-content>
                    </x-slot>
                </x-nav-dropdown> 
                <x-nav-link href="{{route('contact')}}" :active="request()->routeIs('contact')">
                    {{ __('Contact us') }}
                </x-nav-link>               
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    @guest('admin')
                        <x-link-one href="/login" class="mr-2">Login</x-link-one>
                        <x-link-two href="/pricing">Get started</x-link-two>
                    @endguest
                    @admin
                    <x-link-one href="{{route('admin.dashboard')}}">Control panel</x-link-one>
                    @endadmin
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-primary transition">                                        
                                            @if (auth()->user()->profile_photo_path)
                                            <img src="{{asset('storage/'.auth()->user()->profile_photo_path)}}" alt="{{ Auth::user()->username }}" class="h-8 w-8 rounded-full shadow object-cover">  
                                            @else
                                            <img src="{{asset('storage/profile-photos/user.jpg')}}" alt="{{ Auth::user()->username }}" class="h-8 w-8 rounded-full shadow object-cover"> 
                                            @endif                                            
                                    </button>                                
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-primary-base text-opacity-90">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('user.dashboard') }}">
                                    {{ __('Portfolio') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>                               
                                <div class="border-t border-primary-light"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                </div>
            </div>
            <div class="-mr-2 flex items-center sm:hidden hamburger">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-primary hover:text-primary-dark hover:bg-primary-lighter focus:outline-none focus:bg-primary-lighter focus:text-primary-dark transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3.75 9h16.5m-16.5 6.75h16.5" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    {{-- responsive --}}
    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden fixed inset-0 z-30 bg-primary-white transition ease-in-out duration-500">
        <div class="flex justify-between items-center pl-4 border-b border-primary-light">
            <a href="{{route('guestHome')}}"><x-application-logo /></a>
            <button @click="open = !open" class="p-4">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" clip-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="h-full">
            <ul class="pt-2 pb-3 divide-y divide-primary-light">
                <x-responsive-menu-group>
                    <x-slot name="trigger">                        
                            {{ __('Managed investing') }}
                    </x-slot>
                    <x-slot name="items">
                        <x-responsive-nav-link class="underline inline-flex items-center" href="{{ route('managedInvesting') }}" :active="request()->routeIs('managedInvesting')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>                              
                            <span class="ml-2">{{ __('Managing investing') }}</span>
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="underline inline-flex items-center" href="{{ route('managedInvesting').'#features' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>                              
                            <span class="ml-2">{{ __('Features of Managed investing') }}</span>
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="underline inline-flex items-center" href="{{ route('managedInvesting').'#plans' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>                              
                            <span class="ml-2">{{ __('Socially responsible portfolio') }}</span>
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="underline inline-flex items-center" href="{{ route('managedInvesting').'#faqs' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>                              
                            <span class="ml-2">{{ __('Frequently asked questions') }}</span>
                        </x-responsive-nav-link>
                    </x-slot>
                </x-responsive-menu-group>
                <x-responsive-nav-link href="{{ route('pricing') }}" :active="request()->routeIs('pricing')">
                    {{ __('Pricing') }}
                </x-responsive-nav-link>
                <x-responsive-menu-group>
                    <x-slot name="trigger">                        
                            {{ __('Company') }}
                    </x-slot>
                    <x-slot name="items">
                        <x-responsive-nav-link class="underline inline-flex items-center" href="{{ route('about') }}" :active="request()->routeIs('managedInvesting')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>                              
                            <span class="ml-2">{{ __('About us') }}</span>
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="underline inline-flex items-center" href="{{ route('about').'#team' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>                              
                            <span class="ml-2">{{ __('Executives and directors') }}</span>
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="underline inline-flex items-center" href="{{ route('reviews') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>                              
                            <span class="ml-2">{{ __('Testimonial from clients') }}</span>
                        </x-responsive-nav-link>                        
                    </x-slot>
                </x-responsive-menu-group>
                <x-responsive-menu-group>
                    <x-slot name="trigger">                        
                            {{ __('Support and tools') }}
                    </x-slot>
                    <x-slot name="items">
                        <x-responsive-nav-link class="underline inline-flex items-center" href="{{ route('contact') }}" :active="request()->routeIs('managedInvesting')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>                              
                            <span class="ml-2">{{ __('Contact us') }}</span>
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="underline inline-flex items-center" href="{{ route('projector') }}" :active="request()->routeIs('managedInvesting')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>                              
                            <span class="ml-2">{{ __('ROI Projector') }}</span>
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="underline inline-flex items-center" href="{{ route('knowledge') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>                              
                            <span class="ml-2">{{ __('knowledge base') }}</span>
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="underline inline-flex items-center" href="{{ route('knowledge').'#faqs' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>                              
                            <span class="ml-2">{{ __('Frequently asked questions') }}</span>
                        </x-responsive-nav-link>                        
                    </x-slot>
                </x-responsive-menu-group>
                <x-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
            </ul>
            <!-- Responsive Settings Options -->
            <div class="absolute left-0 right-0 bottom-0 pt-4 pb-4 border-t border-primary-light">
                @auth
                    <div class="flex items-center px-4">                        
                        <div class="shrink-0 mr-3">
                            @if (auth()->user()->profile_photo_path)
                            <img src="{{asset('storage/'.auth()->user()->profile_photo_path)}}" alt="{{ Auth::user()->username }}" class="h-10 w-10 rounded-full shadow object-cover">  
                            @else
                            <img src="{{asset('storage/profile-photos/user.jpg')}}" alt="{{ Auth::user()->username }}" class="h-10 w-10 rounded-full shadow object-cover"> 
                            @endif
                        </div>                        
                    </div>

                    <div class="mt-3 space-y-1 divide-y divide-primary-light">
                        <!-- Account Management -->
                        <x-responsive-nav-link href="{{ route('user.dashboard') }}" :active="request()->routeIs('user.dashboard')">
                            {{ __('Portfolio') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>                    
                    </div>
                @endauth
                @admin
                <div class="flex justify-center items-center">
                    <x-link-one href="{{route('admin.dashboard')}}">Control panel</x-link-one>
                </div>
                @endadmin
                @guest('admin')
                    <div class="flex justify-center items-center">
                        <x-link-one href="/login" class="mr-4">Login</x-link-one>
                        <x-link-two href="/pricing">Get started</x-link-two>
                    </div>
                @endguest
            </div>
        </div>        
    </div>
</div>