<x-guest-layout>
    <div class="h-screen flex md:items-center justify-center">
        <div class="w-full max-w-5xl h-full flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
            <x-allset-svg />
            <h2 class="futura-medium text-2xl mt-5 mb-7">Great Job! You are all set.</h2>
            <div class="flex justify-center items-center flex-wrap">
                <div class="p-2">
                    <x-link-two href="{{ route('user.dashboard') }}" class="rounded-lg">View portfolio</x-link-two>
                </div>
                <div class="p-2">
                    <x-link-one href="{{ route('guest_home') }}" class="rounded-lg">Return home</x-link-one>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
