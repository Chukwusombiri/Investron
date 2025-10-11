<div class="futura-book bg-white px-6">
    <h3 class="mt-4 border-b border-gray-150 text-lg leading-6 font-medium text-gray-900">
        Change User's Password
    </h3>    
    <div class="mt-4">
        <x-label for="password" value="{{__('Password')}}" />
        <x-input id="password" class="block mt-1 w-full shadow-none" type="password" wire:model.live="password" required autocomplete="new-password" />
        <x-input-error for="password" />
    </div>
    <div class="mt-4">
        <x-label for="password_confirmation" value="{{__('Confirm Password')}}" />
        <x-input id="password_confirmation" class="block mt-1 w-full shadow-none" type="password" wire:model.live="password_confirmation" required autocomplete="new-password" />
        <x-input-error for="password_confirmation" />
    </div>    
    <div class="mt-4 px-4 pb-5 sm:px-4 flex justify-end items-center">
        <x-danger-button class="mr-4" wire:click="$emit('closeModal')">Close</x-danger-button>
        <x-button type="button" wire:click="save">Save</x-button>
    </div>
</div>
