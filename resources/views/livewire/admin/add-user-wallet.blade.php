<div class="futura-book">
    <div class="px-4 py-4">        
        <h2 class="text-lg text-gray-700 text-center mb-4">Edit payment method {{$user->username}}</h2>                      
        <div class="w-full mb-2">
            <x-label for="name" value="{{__('Wallet name')}}" />
            <x-input type="text" wire:model.live="name" class="block w-full mt-2" />
            <x-input-error for="name" class="mt-1"/>
        </div>
        <div class="w-full mb-2">
            <x-label for="address" value="{{__('Wallet Address')}}" />
            <x-input type="text" wire:model.live="address" class="block w-full mt-2" />
            <x-input-error for="address" class="mt-1"/>
        </div>                          
    </div>
    <div class="w-full flex justify-end items-center p-4 bg-gray-200">
        <button onclick='Livewire.emit("closeModal")'
         class="px-4 py-2 bg-rose-600 rounded-md text-sm text-gray-100 mr-4">close</button>
        <button wire:click="save" class="px-4 py-2 bg-sky-600 rounded-md text-sm text-gray-100">save</button>
    </div>
</div>