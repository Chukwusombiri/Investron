<x-user-layout>
    <x-user-nav page="Payment" />
    <div class="relative futura-book w-full px-6 py-6 mx-auto">        
        <!-- content -->
        <div class="flex flex-wrap -mx-3">
            <div class="max-w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                <div
                    class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="sedan-regular text-2xl mb-0">Payment Method</h6>
                            </div>
                            <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                <a href="{{route('user.payment.create')}}" class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25"
                                    href="javascript:;"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New wallet</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap -mx-3">
                            <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                Manage your profit withdrawal methods here. See all your payment informations, edit,
                                delete and also be able to add new ones.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <livewire:user.payments />
    </div>
    <x-user-footer />
</x-user-layout>
