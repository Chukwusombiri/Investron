<div x-data='{isOpen:false}'>
    <div class="flex justify-between items-center w-full pl-3 pr-4 py-2 text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out" @click="isOpen=true">
        {{$trigger}}
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>          
    </div>
    <div x-show="isOpen" class="fixed inset-0 z-30 bg-gray-50 transition ease-in-out duration-500">
        <div class="flex justify-between items-center pl-4 border-b border-gray-200">
            <button class="p-4 inline-flex items-center"  @click="isOpen=false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                <span class="ml-2">Return</span> 
            </button>
            <button @click="open = !open" class="p-4">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" clip-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="divide-y divide-gray-200">
            {{$items}}
        </div>
    </div>
</div>