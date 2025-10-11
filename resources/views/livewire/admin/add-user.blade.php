<div class="futura-book">
    <div wire:loading.delay.long wire:target="save" >
        <div class="absolute top-1/2 left-1/2 h-24 w-24 flex" style="transform: translate(-50%, -50%);">
            <div class="relative rounded-full w-full h-full border-t-8 border-b-8 border-blue-500 animate-spin"></div>
        </div>
    </div>  
    <div class="px-4 py-4">        
        <h2 class="text-lg text-gray-700 text-center">Create new user</h2>       
        <div class="w-full mb-2">
            <x-label for="username" value="{{__('Username')}}" />
            <x-input type="text" wire:model.live="username" class="block w-full mt-2" />
            <x-input-error for="username" class="mt-1"/>
        </div>
        <div class="w-full mb-2">
            <x-label for="email" value="{{__('Email address')}}" />
            <x-input type="text" wire:model.live="email" class="block w-full mt-2" />
            <x-input-error for="wallet" class="mt-1"/>
        </div>                 
        <div class="w-full mb-2">
            <x-label for="password" value="{{__('Password')}}" />
            <x-input type="password" wire:model.live="password" class="block w-full mt-2" />
            <x-input-error for="password" class="mt-1"/>
        </div>
        <div class="w-full mb-2">
            <x-label for="password_confirmation" value="{{__('Confirm password')}}" />
            <x-input type="password" wire:model.live="password_confirmation" class="block w-full mt-2" />
            <x-input-error for="password_confirmation" class="mt-1"/>
        </div>                               
    </div>
    <div class="w-full flex justify-end items-center p-4 bg-gray-200">
        <button onclick='Livewire.emit("closeModal")'
         class="px-4 py-2 bg-rose-600 rounded-md text-sm text-gray-100 mr-4">close</button>
        <button wire:click="save" class="px-4 py-2 bg-sky-600 rounded-md text-sm text-gray-100">save</button>
    </div>
</div>