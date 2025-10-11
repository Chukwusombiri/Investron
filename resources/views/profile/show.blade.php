<x-user-layout>
    @livewire('user.user-nav',['sentPage' => 'Profile'])

    <div class="frank-regular w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative mb-6 break-words border-0 border-transparent border-solid shadow-3xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                        @livewire('user.update-profile-information')
                        
                        <div class="mt-10">
                            @livewire('user.update-password-form')
                        </div>

                        <x-section-border />

                        {{-- personal details --}}
                        <div class="mt-10">
                            @livewire('user.bio-data')
                        </div>

                        <x-section-border />

                        {{-- demoraphic --}}
                        <div class="mt-10">
                            @livewire('user.update-demographic')
                        </div>

                        <x-section-border />

                        {{-- contact detail --}}
                        <div class="mt-10">
                            @livewire('user.update-contact-detail')
                        </div>

                        <x-section-border />

                        <div class="mt-10">
                            @livewire('user.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- footer --}}
        <x-user-footer />
    </div>
</x-user-layout>
