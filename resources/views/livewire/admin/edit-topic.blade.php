<div>
    <div class="px-4 md:px-8 py-4 md:py-8">
        <h2 class="frank-bold text-lg text-center pb-4 border-b border-gray-300">Update Topic</h2>
        @if (session('error') || session('success'))
            <p class="text-sm py-2">
                @if (session('error'))
                    <span class="text-rose-500">{{session('error')}}</span>
                @else
                    <span class="text-emerald-500">{{session('success')}}</span>
                @endif
            </p>
        @endif
        <form action="post" wire:submit.preventDefault="save">
            <div class="mt-4 flex flex-col gap-2">
                <x-label for="title">Title</x-label>
                <x-input type="text" id="title" class="block" wire:model="title" />
                <x-input-error for="title" />
            </div>

            <div class="pt-4 flex justify-end flex-nowrap gap-3">
                <button class="px-3 py-1.5 md:px-5 md:py-2 text-xs font-semibold uppercase bg-slate-800 hover:bg-opacity-90 text-primary-50 rounded-lg" type="button" wire:click="$dispatch('closeModal')">close</button>
                <button class="px-3 py-1.5 md:px-5 md:py-2 text-xs font-semibold uppercase bg-blue-500 hover:bg-opacity-90 text-primary-50 rounded-lg" type="submit">save</button>
            </div>
        </form>
    </div>
</div>
