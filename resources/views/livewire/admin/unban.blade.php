<div class="bg-slate-200 text-slate-700">
    <div class="w-75 mx-auto py-4">
        <p>This user will be able to login into account after this action.<br>Are you sure you want to un-ban user?</p>        
        <div class="flex justify-end mt-4">
            <button wire:click="$emit('closeModal')" class="bg-gray-600 text-white hover:bg-opacity-50 px-2 py-1 rounded mr-2">cancel</button>
            <button wire:click="unbanUser" class="bg-red-600 text-white hover:bg-opacity-50 px-4 py-1 rounded">yes</button>
        </div>
    </div>
</div>
