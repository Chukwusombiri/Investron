<x-user-layout>
    <x-user-nav page="Withdrawal" />
    <div class=" w-full px-6 py-6 mx-auto">
        <!-- content -->
        @livewire('user.withdrawal-history')
        {{-- footer --}}
        <x-user-footer />
    </div>
</x-user-layout>