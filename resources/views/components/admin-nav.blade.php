@php
    $lastSignIn = auth('admin')->user()->last_sign_out_at!==null ?? now();
    $latestRequests = \App\Models\Deposit::where('created_at', '>', $lastSignIn)->get();
@endphp
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-align-left w-6 h-6"
                    width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 6l16 0" />
                    <path d="M4 12l10 0" />
                    <path d="M4 18l14 0" />
                </svg>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.users') }}" class="nav-link">Users</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <div class="navbar-nav ml-auto flex items-center">
        {{-- INVESTMENT DROPDOWN --}}
        <div x-data="{ open: false }">
            <div class="relative">
                <x-dropdown align="right" width='48'>
                    <x-slot name="trigger">
                        <span class="inline-flex">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                                </svg>

                                @if (count($latestRequests) > 0)
                                    <span class="self-start bg-red-500 text-white rounded-full w-2 h-2"></span>
                                @endif
                            </button>
                        </span>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        @if (count($latestRequests) > 0)
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ count($latestRequests) }} New Deposit request
                            </div>
                            @foreach ($latestRequests as $requestItem)
                                @if ($requestItem->user)
                                    <x-dropdown-link class="flex justify-between text-gray-700 hover:text-opacity-50"
                                        href="{{ route('admin.deposits') . '#' . $requestItem->id }}"
                                        style="padding: 5px 5px !important">
                                        <span>{{ $requestItem->user->username ?? $requestItem->user->email }}</span>
                                        <span class="flex items-center">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </span>
                                            <span>
                                                {{ $requestItem->amount }}
                                            </span>
                                        </span>
                                    </x-dropdown-link>
                                @endif
                            @endforeach
                            <div class="border-t border-gray-200"></div>
                            <x-dropdown-link href="{{ route('admin.deposits') }}" class="flex">
                                <span class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </span>
                                <span>{{ __('view all') }}</span>
                            </x-dropdown-link>
                        @else
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                No deposit request
                            </div>
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>
        </div>

        <!-- Logout Dropdown Menu -->
        <div x-data="{ open: false }">
            <div class="relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                @switch(auth('admin')->user()->admin_role)
                                    @case('super_admin')
                                        {{ __('Super admin') }}
                                    @break

                                    @case('operation_manager')
                                        {{ __('Operation manager') }}
                                    @break

                                    @case('moderator')
                                        {{ __('Moderator') }}
                                    @break

                                    @case('content_manager')
                                        {{ __('Content manager') }}
                                    @break

                                    @case('support_assistance')
                                        {{ __('Support assistance') }}
                                    @break

                                    @default
                                        {{ __('Super admin') }}
                                @endswitch

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('admin.company_wallet.create') }}" class="flex">
                            <span class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
                                </svg>
                            </span> {{ __('Add Wallet') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('admin.resetpwd') }}" class="flex">
                            <span class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                                </svg>
                            </span>
                            {{ __('Change Password') }}
                        </x-dropdown-link>

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('admin.logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('admin.logout') }}" @click.prevent="$root.submit();"
                                class="flex">
                                <span class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                    </svg>
                                </span>
                                <span>{{ __('Log Out') }}</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
<!-- /.navbar -->
