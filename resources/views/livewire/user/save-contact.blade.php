<div class="w-full mt-6 px-6 py-4 bg-primary-50 border border-gray-300 hover:border-blue-500 rounded-xl">
    <h3 class="futura-medium font-semibold text-2xl mb-3">
        Contact information
    </h3>
    <p class="futura-book mb-6">
        Fill out the form completely.
    </p>
    <x-alert />
    <x-validation-errors class="mb-4" />

    <div>
        <div class="relative w-full">
            <x-label for="address" value="{{ __('Address') }}" />
            <x-input wire:model.live="address" id="address" class="block mt-1 w-full px-4 py-2 md:py-4" placeholder="Enter your address"/>
            <x-input-error for="address" />            
        </div>
        <div class="grid grid-cols-2 gap-6 mt-4">
            <div class="col-span-2 md:col-span-1">
                <x-label for="phone" value="{{ __('Phone') }}" />
                <x-input id="phone" class="block mt-1 w-full px-4 py-2 md:py-4" type="text" wire:model.live="phone"
                    required autofocus autocomplete="phone" placeholder="Enter your phone number" />
                <x-input-error for="phone" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="city" value="{{ __('city of residence') }}" />
                <x-input id="city" class="block mt-1 w-full px-4 py-2 md:py-4" type="text" wire:model.live="city"
                    required autofocus autocomplete="city" placeholder="Enter your city" />
                <x-input-error for="city" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 mt-4">
            <div class="relative col-span-2 md:col-span-1">
                <x-label for="country" value="{{ __('country of residence') }}" />
                <x-input id="country" class="block mt-1 w-full px-4 py-2 md:py-4" type="text" wire:model.live="country"
                    required autofocus autocomplete="country" placeholder="Enter your country" />
                <x-input-error for="country" />
                @if (count($countrySuggestions) > 0)
                    <div id="countrySuggestionList"
                        class="absolute top-full z-10 max-h-64 overflow-y-scroll bg-white w-full border border-gray-300 mt-1 rounded-xl shadow-md">
                        @foreach ($countrySuggestions as $c => $cSuggest)
                            <button type="button" wire:click="setCountry('{{ $cSuggest }}','country')"
                                class="block w-full py-1 px-4 text-start outline-none border-none hover:bg-gray-100">{{ $cSuggest }}</button>
                        @endforeach
                    </div>
                @else
                    <div id="countrySuggestionList" class="hidden"></div>
                @endif
            </div>
            <div class="relative col-span-2 md:col-span-1">
                <x-label for="nationality" value="{{ __('Nationality') }}" />
                <x-input id="nationality" class="block mt-1 w-full px-4 py-2 md:py-4" type="text"
                    wire:model.live="nationality" required autofocus autocomplete="nationality"
                    placeholder="Enter your nationality" />
                <x-input-error for="nationality" />
                @if (count($nationSuggestions) > 0)
                    <div id="nationSuggestionList"
                        class="absolute top-full z-10 max-h-64 bg-white w-full border border-gray-300 mt-1 rounded-xl shadow-md overflow-y-scroll">
                        @foreach ($nationSuggestions as $n => $nSuggest)
                            <button type="button" wire:click="setCountry('{{ $nSuggest }}','nationality')"
                                class="block w-full py-1 px-4 text-start outline-none border-none hover:bg-gray-100">{{ $nSuggest }}</button>
                        @endforeach
                    </div>
                @else
                    <div id="nationSuggestionList" class="hidden"></div>
                @endif
            </div>
        </div>        
        <div class="flex items-center justify-center mt-4">
            <x-secondary-button type="button" wire:click="save" class="ml-4 text-sm font-semibold bg-vibrant text-primary-50 hover:bg-opacity-80">
                {{ __('submit') }}
            </x-secondary-button>
        </div>

    </div>
</div>
