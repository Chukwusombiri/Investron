<x-form-section submit="save">
    <x-slot name="title">
        {{ __('Demographic Informations') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your demographic information.') }}
    </x-slot>

    <x-slot name="form">    
        <x-alert />    
        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone" value="{{ __('Phone') }}" />
            <x-input id="phone" type="text" class="mt-1 block w-full" wire:model="phone" autocomplete="phone" />
            <x-input-error for="phone" class="mt-2" />
        </div>
        {{-- address --}}
        <div class="relative col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Address') }}" />
            <x-input wire:model.live="address" id="address" class="block mt-1 w-full"/>
            <x-input-error for="address"  class="mt-2" />
            @if (count($addressSuggestions) > 0)
                <div id="addressSuggestionList"
                    class="absolute top-full z-50 bg-white w-full border border-gray-300 mt-1 rounded-xl shadow-md">
                    @foreach ($addressSuggestions as $s => $suggest)
                        <button type="button" wire:click="setAddress('{{ $suggest }}')"
                            class="block w-full py-1 px-4 text-start outline-none border-none">{{ $suggest }}</button>
                    @endforeach
                </div>
            @else
                <div id="addressSuggestionList" class="hidden"></div>
            @endif
        </div>
        {{-- city --}}
        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('City') }}" />
            <x-input id="city" type="text" class="mt-1 block w-full" wire:model="city" autocomplete="city" />
            <x-input-error for="city" class="mt-2" />
        </div>
        {{-- country --}}
        <div class="relative col-span-6 sm:col-span-4">
            <x-label for="country" value="{{ __('country of residence') }}" />
            <x-input id="country" class="block mt-1 w-full" type="text" wire:model.live="country"
                required autocomplete="country"/>
            <x-input-error for="country"  class="mt-2" />
            @if (count($countrySuggestions) > 0)
                <div id="countrySuggestionList"
                    class="absolute top-full z-50 bg-white w-full border border-gray-300 mt-1 rounded-xl shadow-md">
                    @foreach ($countrySuggestions as $c => $cSuggest)
                        <button type="button" wire:click="setCountry('{{ $cSuggest }}','country')"
                            class="block w-full py-1 px-4 text-start outline-none border-none">{{ $cSuggest }}</button>
                    @endforeach
                </div>
            @else
                <div id="countrySuggestionList" class="hidden"></div>
            @endif
        </div>
        <!-- nationality -->
        <div class="relative col-span-6 sm:col-span-4">
            <x-label for="nationality" value="{{ __('Nationality') }}" />
            <x-input id="nationality" class="block mt-1 w-full" type="text"
                wire:model.live="nationality" required autocomplete="nationality"/>
            <x-input-error for="nationality"  class="mt-2" />
            @if (count($nationSuggestions) > 0)
                <div id="nationSuggestionList"
                    class="absolute top-full z-50 bg-white w-full border border-gray-300 mt-1 rounded-xl shadow-md">
                    @foreach ($nationSuggestions as $n => $nSuggest)
                        <button type="button" wire:click="setCountry('{{ $nSuggest }}','nationality')"
                            class="block w-full py-1 px-4 text-start outline-none border-none">{{ $nSuggest }}</button>
                    @endforeach
                </div>
            @else
                <div id="nationSuggestionList" class="hidden"></div>
            @endif
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
