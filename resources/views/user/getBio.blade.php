<x-guest-layout>
    <div class="w-full mt-6 px-6 py-4 bg-primary-50 border border-gray-300 hover:border-blue-500 overflow-hidden rounded-xl">
        <h3 class="futura-medium font-semibold text-2xl mb-3">
            Demographic information
        </h3>
        <p class="futura-book mb-6">
            These pieces of information are crucial for ensuring compliance with legal regulations and policies
            applicable to your region.
        </p>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('user.info.demographic') }}">
            @csrf

            <div>
                <x-label for="age" value="{{ __('Age') }}" />
                <x-input id="age" class="block mt-1 w-full px-4 py-2 md:py-4" type="number" name="age"
                    min="1" :value="auth()->user()->age ?? old('age')" required autofocus autocomplete="age"
                    placeholder="Enter your age" />
                <x-input-error for="age" />
            </div>
            <div class="mt-4">
                <x-label for="gender" value="{{ __('Gender') }}" />
                <x-select name="gender" id="gender">
                    <option value="">choose gender</option>
                    <option @if (auth()->user()->gender === 'male') {{ 'selected' }} @endif value="male">Male</option>
                    <option @if (auth()->user()->gender === 'female') {{ 'selected' }} @endif value="female">Female</option>
                    <option @if (auth()->user()->gender === 'others') {{ 'selected' }} @endif value="others">Others</option>
                </x-select>
                <x-input-error for="gender" />
            </div>
            <div class="mt-4">
                <x-label for="marital_status" value="{{ __('Marital status') }}" />
                <x-select name="marital_status" id="marital_status">
                    <option value="">choose marital status</option>
                    <option value="single" @if (auth()->user()->gender === 'single') {{ 'selected' }} @endif>Single</option>
                    <option value="married" @if (auth()->user()->gender === 'married') {{ 'selected' }} @endif>Married
                    </option>
                    <option value="divorced" @if (auth()->user()->gender === 'divorced') {{ 'selected' }} @endif>Divorced
                    </option>
                    <option value="others" @if (auth()->user()->gender === 'others') {{ 'selected' }} @endif>Others</option>
                </x-select>
                <x-input-error for="marital_status" />
            </div>
            <div class="mt-4">
                <x-label for="occupation" value="{{ __('Occupation') }}" />
                <x-input id="occupation" :value="auth()->user()->occupation ?? old('occupation')" class="block mt-1 w-full px-4 py-2 md:py-4" type="text"
                    name="occupation" required autocomplete="occupation" placeholder="Enter your occupation" />
                <x-input-error for="occupation" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-secondary-button type="submit" class="ml-4 text-sm font-semibold bg-vibrant text-primary-50 hover:bg-opacity-80">
                    {{ __('submit') }}
                </x-secondary-button>
            </div>

        </form>
    </div>
</x-guest-layout>
