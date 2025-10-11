<x-user-layout>
    <x-user-nav page="Payment" />
    <div class="w-full px-6 py-6 mx-auto">
        <!-- content -->
        <div class="flex flex-wrap -mx-3">
            <div class="max-w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                @livewire('user.create-deposit',['sentPlan' => $plan])
            </div>
        </div>
    </div>
    <x-user-footer />
</x-user-layout>