<x-user-layout>
    <!-- Navbar -->
    <x-user-nav page="dashboard" />
    <!-- cards -->
    <div class="frank-regular w-full px-6 py-6 mx-auto">
        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full max-w-full px-3 mt-0">
                <h2 class="futura-medium text-2xl mb-4 text-neutral-900 tracking-wide">
                    Choose your preferred plan
                </h2>
                <div class="w-full relative flex py-6 min-w-0 mb-6">
                    <div class="grid grid-cols-6 gap-6 justify-center">                       
                        @foreach ($plans as $item)
                        <div
                        class="col-span-6 sm:col-span-3 lg:col-span-2 flex bg-primary-500 text-neutral-100 rounded-xl">
                        <div class="w-full h-full p-6 text-neutral-100">
                            <div class="mb-10">
                                <span
                                    class="px-6 py-2 futura-light text-primary-500 uppercase bg-neutral-100 rounded-2xl shadow">
                                    ${{ number_format(auth()->user()->plans->firstWhere('id', $item->id)?->pivot->total ?? 0) }} in assets
                                </span>
                            </div>
                            <div class="flex items-center mb-6">
                                <span
                                    class="capitolium text-xl md:text-3xl ml-2">{{ $item->name }}</span>                                
                            </div>                               
                            @foreach (json_decode($item->features) as $feature)
                                <div class="flex items-start mb-px md:mb-1.5">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span class="ml-2">
                                        {{ $feature }}
                                    </span>
                                </div>
                            @endforeach
                            <div class="mt-6 flex items-center justify-center p-4">
                                <a href="{{ route('user.deposit.create',[$item->id]) }}"
                                    class="bg-vibrant px-8 py-2 rounded-2xl shadow text-primary-50">                                    
                                    Deposit
                                </a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- footer --}}
    <x-user-footer />
    </div>
</x-user-layout>
