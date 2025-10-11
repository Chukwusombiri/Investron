<x-user-layout>
    <x-user-nav page="Deposit" />
    <div class="futura-book w-full px-6 py-6 mx-auto">
        <!-- content -->
        <div class="flex flex-wrap -mx-3">
            <div class="max-w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none flex justify-center">
                <div class="w-full max-w-xl mx-auto flex flex-col items-center min-w-0 mt-6 px-4 py-4 bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    @livewire('user.deposit-receipt',['sentDeposit' => $deposit->id])           
                </div>
            </div>
        </div>
    </div>
    <x-user-footer />
</x-user-layout>
