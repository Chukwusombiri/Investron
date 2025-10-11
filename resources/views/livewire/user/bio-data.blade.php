<x-form-section submit="save">
    <x-slot name="title">
        {{ __('Personal Informations') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your personal information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- first name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="first_name" value="{{ __('First Name') }}" />
            <x-input id="first_name" type="text" class="mt-1 block w-full" wire:model="first_name" autocomplete="first_name" />
            <x-input-error for="first_name" class="mt-2" />
        </div>

        <!-- last name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="last_name" value="{{ __('First Name') }}" />
            <x-input id="last_name" type="text" class="mt-1 block w-full" wire:model="last_name" autocomplete="last_name" />
            <x-input-error for="last_name" class="mt-2" />
        </div>                
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
