<div
    class="w-full max-w-2xl mx-auto flex flex-col min-w-0 mt-6 px-6 py-6 break-words bg-white text-primary-500 border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
    <x-alert />
    <h3 class="frank-bold font-semibold text-2xl mb-3">
        Funds withdrawal
    </h3>
    <div class="mt-2 md:mt-4">
        <p class="frank-regular text-md mb-px md:mb-2">Portfolio balance:
            <span>${{ number_format(auth()->user()->acRoi) }}</span></p>
        <p class="frank-regular text-md mb-px md:mb-2">Monthly Performance: <span
                class="">${{ number_format(auth()->user()->perMonRoi) }}</span></p>
        <p class="frank-regular text-md">Profit: <span
                class="">${{ number_format(auth()->user()->acRoi - auth()->user()->acBal) }}</span></p>
    </div>
    <div class="mt-4">
        <x-label for="amount" class="font-semibold" value="{{ __('Plan to withdraw funds') }}" />
        <x-select wire:model="plan_id">
            <option value="">Choose plan</option>
            @if (auth()->user()->plans)
                @foreach (auth()->user()->plans as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} | available funds: ${{$item->subscription->roi}}</option>
                @endforeach
            @endif
        </x-select>
        <x-input-error for="plan" />
    </div>
    <div class="mt-4">
        <x-label for="amount" class="font-semibold" value="{{ __('Amount to withdraw ($)') }}" />
        <x-input id="amount" class="block mt-1 w-full px-4 py-2 md:py-4 shadow-none" type="number"
            wire:model.live="amount" min="1" required autocomplete="amount"
            placeholder="Enter amount to  deposit" />
        <x-input-error for="amount" />
    </div>
    
    <div class="mt-4">
        <x-label for="selectedWalletId" class="font-semibold" value="{{ __('Choose your payment method') }}" />
        <x-input-error for="selectedWalletId" />
        <x-input-error for="selectedWallet" />
        <x-input-error for="selectedAddress" />
        @if ($allWallets && count($allWallets) > 0)
            <div class="mt-2 flex flex-wrap" x-data="{ selectedWalletId: @entangle('selectedWalletId').live }">
                @foreach ($allWallets as $element)
                    <div class="p-1 md:p-2">
                        <div class="flex items-center">
                            <button wire:click='tryValue("{{ $element->id }}")'
                                x-bind:class="{ 'bg-gray-300 ring-1 ring-vibrant': selectedWalletId === '{{ $element->id }}' }"
                                class="select-none cursor-pointer flex items-center justify-center rounded-lg border border-gray-300 py-2 px-4 font-semibold text-gray-700 text-sm transition-colors duration-200 ease-in-out">
                                <span>{{ $element->name }}</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="md:mt-2 flex flex-wrap">
                <p class="text-gray-700">You've not added withdrawal payment methods.</p>
            </div>
        @endif
    </div>

    <div class="flex items-center justify-center mt-4">
        <x-secondary-button type="button" wire:click="withdraw"
            class="inline-block px-6 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25">
            {{ __('Withdraw funds') }}
        </x-secondary-button>
    </div>
    <div class="mt-4 flex">
        <a href="{{ route('user.payment.create') }}" class="underline text-primary">Add your withdrawal payment
            method</a>
    </div>
</div>
