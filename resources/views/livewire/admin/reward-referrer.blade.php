<div class="futura-book">
    <div class="px-4 py-4">        
        <h2 class="text-lg text-gray-700 text-center">Add bonus for upline</h2>
        @if (session()->has('result'))
            <div class="w-full my-4 bg-rose-100 text-rose-900 p-2 rounded-lg">
                {{ session('result') }}
            </div>
        @endif                              
        <div class="w-full mb-2">
            <x-label for="bonus" value="{{__('Bonus')}}" />
            <x-input type="number" wire:model.live="bonus" class="block w-full mt-2" />
            <x-input-error for="bonus" class="mt-1"/>
        </div> 
        <div class="w-full flex flex-col px-2">                                 
            <p class="futura-light text-sm mt-2">Note: This operation won't delete the previous bonus rather it will add to it.
            </p>                         
        </div>                      
    </div>
    <div class="w-full flex justify-end items-center p-4 bg-gray-200">
        <button onclick='Livewire.emit("closeModal")'
         class="px-4 py-2 bg-rose-600 rounded-md text-sm text-gray-100 mr-4">close</button>
        <button wire:click="save" class="px-4 py-2 bg-sky-600 rounded-md text-sm text-gray-100">save</button>
    </div>
</div>
