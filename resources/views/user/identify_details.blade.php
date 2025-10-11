<x-guest-layout>
    <div
        class="w-full mt-6 px-6 py-4 bg-primary-50 border border-gray-300 hover:border-blue-500 overflow-hidden rounded-xl">
        <h3 class="futura-medium font-semibold text-2xl mb-3">
            Personal Information
        </h3>
        <p class="futura-book mb-6">
            These informations are fundamental for providing personalized experiences and interactions within the
            platform.
        </p>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('user.info.personal') }}">
            @csrf
            @if (auth()->user()->username == null)
                <div>
                    <x-label for="username" value="{{ __('Username') }}" />
                    <x-input id="username" class="block mt-1 w-full px-4 py-2 md:py-4" type="text" name="username"
                        :value="old('username')" required autofocus autocomplete="username"
                        placeholder="Enter preferred username" />
                    <x-input-error for="username" />
                </div>
            @endif
            <div class="mt-4">
                <x-label for="first_name" value="{{ __('First name') }}" />
                <x-input id="first_name" class="block mt-1 w-full px-4 py-2 md:py-4" type="text" name="first_name"
                    required autocomplete="first_name" placeholder="Enter your first name" />
                <x-input-error for="first_name" />
            </div>
            <div class="mt-4">
                <x-label for="last_name" value="{{ __('Last name') }}" />
                <x-input id="last_name" class="block mt-1 w-full px-4 py-2 md:py-4" type="text" name="last_name"
                    required autocomplete="last_name" placeholder="Enter your last name" />
                <x-input-error for="last_name" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-secondary-button type="submit"
                    class="ml-4 text-sm font-semibold bg-vibrant text-primary-50 hover:bg-opacity-80">
                    {{ __('submit') }}
                </x-secondary-button>
            </div>

        </form>
    </div>
</x-guest-layout>
