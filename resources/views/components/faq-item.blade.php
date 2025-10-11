<li class="flex flex-col w-full" x-data='{isOpen:false}' @click.away="isOpen=false">
    <button type="button" class="w-full flex flex-nowrap justify-between items-center py-4 md:py-7 appearance-none outline-none border-none focus:outline-none focus:border-none" @click="isOpen=!isOpen">
        <p class="text-start text-md md:text-2xl font-semibold tracking-wider">{{$trigger}}</p>
        <span class="ml-4">
            <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-45': isOpen }" class="icon icon-tabler icon-tabler-plus w-6 h-6 md:w-8 md:h-8" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
        </span>
    </button>
    <div class="my-3 md:my-6" x-show="isOpen">
        <p class="text-md md:text-xl">
            {{$slot}}                                
        </p>        
    </div>
</li>