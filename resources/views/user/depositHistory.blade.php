<x-user-layout>
    <x-user-nav page="Deposit" />
    <div class="futura-book w-full px-6 py-6 mx-auto">
        <!-- content -->
        @livewire('user.deposit-history')
        {{-- footer --}}
        <x-user-footer />
    </div>
</x-user-layout>