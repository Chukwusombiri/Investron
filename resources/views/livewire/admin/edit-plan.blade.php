<div class="flex flex-col items-center px-4 md:px-6 py-4">
    <x-admin-alert class="w-full mb-4"/>
    <div class="w-full">
        <div class="grid grid-cols-2 items-center justify-center gap-2">
            <div class="col-span-2 md:col-span-1">
                <x-label for="name" value="{{__('Name')}}"/>
                <x-input type="text" wire:model.live="name" class="mt-2 block w-full" />
                <x-input-error for="name" class="mt-1"/>
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="duration" value="{{__('Duration in months')}}"/>
                <x-input type="number" wire:model.live="duration" class="mt-2 block w-full" />
                <x-input-error for="duration" class="mt-1"/>                       
            </div>                                    
        </div>
        <div class="grid grid-cols-2 items-center justify-center gap-2 mt-4">
            <div class="col-span-2 md:col-span-1">
                <x-label for="min" value="{{__('Minimum amount')}}"/>
                <x-input type="number" wire:model.live="min" class="mt-2 block w-full" />
                <x-input-error for="min" class="mt-1"/>
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="max" value="{{__('Maximum amount')}}"/>
                <x-input type="number" wire:model.live="max" class="mt-2 block w-full" />
                <x-input-error for="max" class="mt-1"/>                       
            </div>                                    
        </div>
        <div class="grid grid-cols-2 items-center justify-center gap-2 mt-4">
            <div class="col-span-2 md:col-span-1">
                <x-label for="perMonInt" value="{{__('Monthly interest rate')}}"/>
                <x-input type="number" wire:model.live="perMonInt" class="mt-2 block w-full" step="0.01"/>
                <x-input-error for="perMonInt" class="mt-1"/>
            </div>                                         
        </div>
    </div>    
    <div class="w-full flex flex-col mt-4">
        <p class="w-full text-sm font-semibold mb-2">Features</p>
        <div class="w-full mb-4">            
            @foreach ($features as $r => $feature)
            <div class="inline-flex items-center overflow-hidden rounded-md border bg-white mr-1 mb-2">
                <span
                    class="border-e px-4 py-2 text-sm/none text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                    {{ $feature }}
                </span>

                <button wire:click="removeFeature({{ $r }})"
                    class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                    <span class="sr-only">remove feature</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endforeach
        <x-input-error for="features" class="mt-1"/>
        <x-input-error for="features.*" class="mt-1"/>
        </div>        
        <div class="w-full mb-4">
            <x-label for="newFeature" value="{{__('Add new feature')}}"/>
            <div class="flex flex-nowrap mb-2">
                <input type="text" id="newFeature" wire:model.live="newFeature"
                    placeholder="Enter new feature (optional)"
                    class="w-7/12 px-4 py-2 rounded-l-lg focus:shadow-primary-outline text-sm leading-5.6 ease appearance-none border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-0 focus:outline-none">
                <button type="button" wire:click='addFeature'
                    class="px-7 py-2 rounded-r-lg font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 cursor-pointer text-xs bg-gray-700 hover:shadow-xs active:opacity-85">
                    Add
                </button>
            </div>
            <x-action-message on="addedFeature">Added new feature</x-action-message>
            <x-input-error for="newFeature"/>
        </div>
    </div>
    <div class="w-full flex justify-end items-center">        
        <x-secondary-button class="rounded-xl" wire:click="save">update plan</x-secondary-button>
    </div>
</div>
