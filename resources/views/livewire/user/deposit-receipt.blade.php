<div class="w-full">
    <x-alert />
    <div class="w-full max-w-full shrink-0 md:flex-0">
        <div class="w-full my-6">
            @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" alt="new photo preview" class="block w-56 h-56 rounded-xs shadow">            
            @elseif($deposit->receipt)
                <p class="font-bold text-sm">uploaded photo</p>
                <img src="{{ url('storage/' . $deposit->receipt) }}" alt="item photo" class="block w-56 h-56 rounded-xs shadow">
            @endif
        </div>
        <div class="relative w-full my-6">
                <p class="text-sm font-bold text-gray-900">Upload photo</p>
                <label for="photo"
                    class="flex justify-center w-full h-32 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none">
                    <span class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>
                        <span class="font-medium text-gray-600">Drop files to Attach, or<span
                                class="text-blue-600 underline ml-[4px]">browse</span></span>
                    </span>
                    <input type="file" wire:model.live="photo" id="photo" class="hidden"
                        accept="image/png,image/jpeg" />
                </label>
                <x-input-error for="photo" />
        </div>        
    </div>
    <div class="flex justify-center items-center">
        <div class="p-2">
            <button type="submit" wire:click="save" class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25">Upload receipt</button>
        </div>                                                                           
    </div>
</div>   