<div>
    <div class="w-75 mx-auto py-4 relative">
        <div
                wire:loading.delay.long
                wire:target="sendMail" 
                >
                <div class="absolute top-1/2 left-1/2 h-24 w-24 flex" style="transform: translate(-50%, -50%);">
                    <div class="relative rounded-full w-full h-full border-t-8 border-b-8 border-blue-500 animate-spin"></div>
                </div>
            </div> 
        <div>
            <h2 class="md:text-lg ml-4 text-dark-700 text-center">Send mail to {{$user->name}}</h2>
        </div>
        <div class="w-3/4 mx-auto mb-2">
            @if (session()->has('result'))
                <div class="bg-red-100 mt-2 p-2">
                    {{ session('result') }}
                </div>
            @endif
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Subject</label>
            <input type="text" wire:model.live="sjt" class="form-control px-2 py-2 rounded-lg">
            @error('sjt')
               <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>                 
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Message</label>
            <textarea type="msg" wire:model.live="msg" class="form-control px-2 py-2 rounded-lg" rows="3"></textarea>
            @error('msg')
                <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>   
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Attach file if any</label>
            <input type="file" wire:model.live="attachee">
            @error('attachee')
               <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>
        @if ($attachee) 
        <div class="w-3/4 mx-auto mb-2">      
            <input type="text" wire:model.live="attachee_name" placeholder="file name to be displayed" class="form-control px-2 py-2 rounded-lg">
            @error('attachee_name')
            <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror 
        </div>
        @endif        
        <div class="flex flex-row justify-end w-3/4 mx-auto p-2">
            <button onclick="Livewire.emit('closeModal')"
             class="btn rounded-full bg-secondary px-3 mr-2 hover:bg-transfer hover:text-dark">close</button>
            <button wire:click="sendMail" class="btn rounded-full bg-info px-3 hover:bg-transfer hover:text-dark">send</button>
        </div>
    </div>
</div>
