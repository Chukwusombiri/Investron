<div class="futura-book">
    <div class="px-4 py-4">        
        <h2 class="text-lg text-gray-700 text-center">Edit deposit before approval</h2>
        @if (session()->has('result'))
            <div class="w-full my-4 bg-rose-100 text-rose-900 p-2 rounded-lg">
                {{ session('result') }}
            </div>
        @endif
        <div class="w-full mb-2">
            <x-label for="plan" value="{{__('Deposit Plan')}}" />
            <x-select wire:model.live="plan" class="block w-full mt-2" id="plan">
                <option value="">select plan</option>
               @foreach ($plans as $plan)
                    <option value="{{$plan->name}}" @if($deposit->plan==$plan->name) {{'selected'}} @endif wire:key="plan-{{ $plan->id }}">
                        {{$plan->name.': min|$'.$plan->min.' - max|$'.$plan->max}}</option>                   
               @endforeach
            </x-select>
            <x-input-error for="plan" class="mt-1"/>
        </div>
        <div class="w-full mb-2">
            <x-label for="wallet" value="{{__('Deposit Wallet')}}" />
            <x-select wire:model.live="wallet" class="block w-full mt-2" id="wallet">
                <option value="">select wallet</option>                
               @foreach ($wallets as $wallet)
                    <option value="{{$wallet->name}}" @if($deposit->wallet==$wallet->name) {{'selected'}} @endif wire:key="wallet-{{ $wallet->id }}">{{$wallet->name}}</option>                   
               @endforeach
            </x-select>
            <x-input-error for="wallet" class="mt-1"/>
        </div>                 
        <div class="w-full mb-2">
            <x-label for="amount" value="{{__('Amount')}}" />
            <x-input type="number" wire:model.live="amount" class="block w-full mt-2" />
            <x-input-error for="amount" class="mt-1"/>
        </div> 
        <div class="w-full flex flex-col px-2 py-4">                     
            @if ($receipt)
                <span class="font-semibold">Receipt:</span>
                <img class="rounded mt-2 h-32 w-32 shadow" src="{{ $receipt->temporaryUrl() }}">
            @elseif($deposit->receipt !== null)
                <span class="font-semibold">Receipt:</span>
                <img class="rounded mt-2 h-32 w-32 shadow" src="{{asset('storage/'. $deposit->receipt)}}" alt="Profile photo" />
            @endif
            <x-input-error for="receipt" class="mt-2"/>
            <p class="futura-light text-sm mt-2">Always remember to save after selecting the new image to be uploaded. Also,
                Uploading a new receipt will automatically delete the old receipt if any.
            </p>
            <div class="flex" x-data>
                <div class="flex mt-2 mr-4">
                    <button x-on:click.prevent="$refs.receipt.click()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Upload
                    </button>
                    <input class="hidden" type="file" id="receipt" wire:model.live="receipt" x-ref="receipt">       
                </div>                        
                @if ($deposit->receipt !== null)
                <div class="flex mt-2">
                    <button class="mr-4 inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" 
                    wire:click='deleteReceipt'>
                        remove
                    </button>
                    <div class="flex items-center">
                        <x-action-message on="removedPhoto">Removed receipt</x-action-message>
                    </div>
                </div>
                @else
                <div class="hidden"></div>
                @endif                                     
            </div>                
        </div>                      
    </div>
    <div class="w-full flex justify-end items-center p-4 bg-gray-200">
        <button onclick='Livewire.emit("closeModal")'
         class="px-4 py-2 bg-rose-600 rounded-md text-sm text-gray-100 mr-4">close</button>
        <button wire:click="save" class="px-4 py-2 bg-sky-600 rounded-md text-sm text-gray-100">save</button>
    </div>
</div>
