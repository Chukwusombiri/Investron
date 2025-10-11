<div
    class="w-full lg:w-7/12 mx-auto flex flex-col min-w-0 mt-6 px-4 py-6 break-words bg-white border border-transparent hover:border-blue-500 shadow-xl rounded-2xl bg-clip-border">
    <x-alert />
    <h3 class="frank-bold text-2xl mb-3 tracking-wide">
        Complete Deposit
    </h3>
    <p class="text-sm mb-2">Deposit starts from ${{number_format($plan->min)}}. The maximum deposit amount is ${{number_format($plan->max)}}</p>
    <div class="mt-4">
        <x-label for="amount" class="" value="{{ __('Amount to deposit ($)') }}" />
        <x-input id="amount" class="block mt-1 w-full px-4 py-2 md:py-4 shadow-0 hover:border-blue-500" type="number" wire:model.live="amount"
            required autocomplete="amount" placeholder="Enter amount to  deposit" />
        <x-input-error for="amount" />
    </div>
    <div class="mt-4">
        <x-label for="selectedWallet" class="" value="{{ __('Choose your funding source') }}" />
        <x-input-error for="selectedWallet" />
        <x-input-error for="selectedAddress" />
        @if ($allWallets && count($allWallets) > 0)            
            <div class="mt-2 flex flex-wrap" x-data="{ selectedWallet: @entangle('selectedWallet').live }">
                @foreach ($allWallets as $element)
                    <div class="p-px md:p-2">
                        <div class="flex items-center">
                            <button wire:click='tryValue("{{ $element->id }}")'                                 
                                x-bind:class="{ 'bg-gray-300 ring-1 ring-vibrant': selectedWallet === '{{ $element->name }}' }"
                                class="select-none cursor-pointer flex items-center justify-center rounded-lg border border-gray-300 py-2 px-4 font-semibold text-gray-700 text-sm transition-colors duration-200 ease-in-out">
                                <span>{{ $element->name }}</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="hidden"></div>
        @endif
    </div>

    <div class="flex items-center justify-center mt-4">
        <x-secondary-button type="button" wire:click="deposit"
            class="inline-block px-6 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25">
            {{ __('Deposit') }}
        </x-secondary-button>
    </div>
</div>
