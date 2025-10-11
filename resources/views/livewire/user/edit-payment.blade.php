<div
    class="w-full lg:w-7/12 mx-auto flex flex-col min-w-0 mt-6 px-6 py-4 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
    <x-alert />
    <h3 class="futura-medium font-semibold text-2xl mb-3">
        Update Payment method
    </h3>

    <div class="mt-4">
        <x-label for="name" value="{{ __('Wallet name') }}" />
        <x-input id="name" class="block mt-1 w-full px-4 py-2 md:py-4" type="text" wire:model.live="name" required
            autocomplete="name" placeholder="Enter cryptocurrency wallet name" />
        <x-input-error for="name" />
    </div>
    <div class="mt-4">
        <x-label for="address" value="{{ __('Wallet Address') }}" />
        <x-input id="address" class="block mt-1 w-full px-4 py-2 md:py-4" type="text" wire:model.live="address" required
            autocomplete="address" placeholder="Enter wallet address" />
        <x-input-error for="address" />
    </div>

    <div class="flex items-center justify-center mt-4">
        <x-secondary-button type="button" wire:click="save"
            class="inline-block px-6 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25">
            {{ __('submit') }}
        </x-secondary-button>
    </div>
</div>