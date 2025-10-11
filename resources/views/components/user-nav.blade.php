@props(['page' => $page])
<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap"
    navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-md leading-normal">
                    <a class="text-neutral-900  opacity-50 capitalize" href="javascript:;">{{ $page }}</a>
                </li>
                <li class="text-md pl-2 capitalize leading-normal text-neutral-900 before:float-left before:pr-2 before:text-neutral-900 before:content-['/']"
                    aria-current="page">{{ auth()->user()->username }}</li>
            </ol>
        </nav>

        <div class="w-3/4 flex items-center justify-end mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <ul class="flex justify-end pl-0 mb-0 list-none md:max-w-full">
                <li class="flex items-center">
                    @if (auth()->user()->profile_photo_path)
                    <img src="{{asset('storage/'.auth()->user()->profile_photo_path)}}" alt="user image" class="w-14 h-14 rounded-full shadow">  
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                      </svg>                      
                    @endif                    
                </li>
                <li class="flex items-center pl-4 xl:hidden">
                    <a href="javascript:void(0);" class="block p-0 text-sm text-primary transition-all ease-nav-brand"
                        sidenav-trigger>
                        <div class="w-4.5 overflow-hidden">
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-primary-500 transition-all"></i>
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-primary-500 transition-all"></i>
                            <i class="ease relative block h-0.5 rounded-sm bg-primary-500 transition-all"></i>
                        </div>
                    </a>
                </li>                
            </ul>
        </div>
    </div>
</nav>
