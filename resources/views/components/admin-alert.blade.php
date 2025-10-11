<div {{$attributes}}>
    @if (session('success'))
    <div x-data="{ open: true }">
        <div x-show="open"
            class="futura-medium tracking-wide flex items-center justify-between px-4 py-2 mx-2 rounded-xl bg-emerald-100 text-emerald-800">
            <span>{{ session('success') }}</span>
            <button @click="open = false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif 
    @if (session('error'))
    <div x-data="{ open: true }">
        <div x-show="open"
            class="futura-medium tracking-wide flex items-center justify-between p-2 mx-2 rounded-xl bg-rose-100 text-emerald-800">
            <span>{{ session('error') }}</span>
            <button @click="open = false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif   
</div>