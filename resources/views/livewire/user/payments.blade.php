<div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 mt-6 md:w-7/12 md:flex-none">
        <x-alert />
        <div
            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                <h6 class="">Payment Information</h6>
            </div>
            <div class="flex-auto p-4 pt-6">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    @if (count($wallets) > 0)
                        @foreach ($wallets as $item)
                            <li id="{{$item->id}}"
                                class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 box-border">
                                <div class="flex flex-col">
                                    <h6 class="mb-4 text-sm leading-normal">{{ $item->name }}</h6>
                                    <span class="mb-px text-sm leading-tight">Address:</span>
                                    <div class="overflow-hidden mb-2">
                                        <span class="w-full font-semibold text-xs text-slate-700 overflow-hidden break-all leading-tight">{{ $item->address }}</span>
                                    </div>
                                    <span class="mb-2 text-sm leading-tight">Added on: <span
                                            class="font-semibold text-slate-700 sm:ml-2">{{ date('M d, Y', strtotime($item->created_at)) }}</span></span>
                                </div>
                                <div class="ml-auto text-right">
                                    <a wire:click="deleteWallet('{{ $item->id }}')"
                                        class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                                        href="javascript:;"><i
                                            class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>Delete</a>
                                    <a href="{{ route('user.payment.edit', [$item->id]) }}"
                                        class="inline-block px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"
                                        href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700"
                                            aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="mt-4">
                    {{$wallets->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
        <div
            class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                <div class="flex flex-wrap -mx-3">
                    <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                        <h6 class="">Payment Transactions</h6>
                    </div>
                </div>
            </div>
            <div class="flex-auto p-4 pt-6">
                <h6 class="mb-4 text-xs font-bold leading-tight uppercasetext-slate-500">Newest
                </h6>
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    @if (count($latest) > 0)
                        @foreach ($latest as $item)
                            <li
                                class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                                <div class="flex items-center">
                                    <button
                                        class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-red-600 border-transparent bg-transparent text-center align-middle font-bold uppercase text-red-600 transition-all hover:opacity-75"><i
                                            class="fas fa-arrow-down text-3xs"></i></button>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 text-sm leading-normal text-slate-700">
                                            {{ $item->wallet }}
                                        </h6>
                                        <span
                                            class="text-xs leading-tight">{{ date('M d, Y H:i', strtotime($item->created_at)) }}</span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p
                                        class="relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-orange-600 bg-clip-text">
                                        ${{ number_format($item->amount) }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
