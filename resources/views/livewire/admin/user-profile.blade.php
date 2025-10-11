<div class="frank-regular">
    <div class="bg-white px-4 sm:p-6 rounded-xl shadow-xl mb-6">
        {{-- personal infos --}}
        <div class="space-y-6 mb-4">
            <h2 class="futura-medium text-lg">Personal information</h2>
            <div class="flex flex-col px-2 py-6">
                @if ($photo)
                    <span class="font-semibold">Photo:</span>
                    <img class="rounded-full mt-2 h-24 w-24 shadow" src="{{ $photo->temporaryUrl() }}">
                @else
                    <span class="font-semibold">Photo:</span>
                    @if ($user->profile_photo_path)
                        <img class="rounded-full mt-2 h-24 w-24 shadow"
                            src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile photo" />
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-14">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    @endif
                @endif
                <x-input-error for="photo" class="mt-2" />
                <p class="futura-light text-sm mt-2">Always remember to save after selecting the new image to be
                    uploaded.</p>
                <div class="flex" x-data>
                    <div class="flex mt-2 mr-4">
                        <button x-on:click.prevent="$refs.photo.click()"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Upload
                        </button>
                        <input class="hidden" type="file" id="profile_image" wire:model.live="photo" x-ref="photo">
                    </div>
                    @if ($user->profile_photo_path !== null)
                        <div class="flex mt-2">
                            <button
                                class="mr-4 inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                wire:click='removeImage'>
                                remove
                            </button>
                            <div class="flex items-center">
                                <x-action-message on="removedPhoto">Removed photo</x-action-message>
                            </div>
                        </div>
                    @else
                        <div class="hidden"></div>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-2 items-center justify-center gap-2">
                <div class="col-span-2 md:col-span-1">
                    <x-label for="username" value="{{ __('Username') }}" />
                    <x-input type="text" wire:model.live="username" class="mt-2 block w-full" />
                    <x-input-error for="username" class="mt-1" />
                </div>
                <div class="col-span-2 md:col-span-1">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input type="text" wire:model.live="email" class="mt-2 block w-full" />
                    <x-input-error for="email" class="mt-1" />
                </div>
            </div>
            <div class="grid grid-cols-2 items-center justify-center gap-2">
                <div class="col-span-2 md:col-span-1">
                    <x-label for="first_name" value="{{ __('First name') }}" />
                    <x-input type="text" wire:model.live="first_name" class="mt-2 block w-full" />
                    <x-input-error for="first_name" class="mt-1" />
                </div>
                <div class="col-span-2 md:col-span-1">
                    <x-label for="last_name" value="{{ __('Last name') }}" />
                    <x-input type="text" wire:model.live="last_name" class="mt-2 block w-full" />
                    <x-input-error for="last_name" class="mt-1" />
                </div>
            </div>
            <div class="flex justify-end items-center">
                <x-action-message on="savedPersonal" />
                <x-secondary-button class="ml-3" wire:click="savePersonal">Save</x-secondary-button>
            </div>
        </div>
        <hr><br><br>
        {{-- demographic infos --}}
        <div class="space-y-6 mb-4">
            <h2 class="futura-medium text-lg">Demographic information</h2>
            <div class="grid grid-cols-2 items-center justify-center gap-2">
                <div class="col-span-2 md:col-span-1">
                    <x-label for="age" value="{{ __('Age') }}" />
                    <x-input type="number" wire:model.live="age" class="mt-2 block w-full" />
                    <x-input-error for="age" class="mt-1" />
                </div>
                <div class="col-span-2 md:col-span-1">
                    <x-label for="email" value="{{ __('Gender') }}" />
                    <x-select name="gender" id="gender" wire:model.live="gender" class="mt-1 block w-full">
                        <option value="">choose gender</option>
                        <option @if ($user->gender === 'male') {{ 'selected' }} @endif value="male">Male
                        </option>
                        <option @if ($user->gender === 'female') {{ 'selected' }} @endif value="female">Female
                        </option>
                        <option @if ($user->gender === 'others') {{ 'selected' }} @endif value="others">Others
                        </option>
                    </x-select>
                    <x-input-error for="gender" class="mt-1" />
                </div>
            </div>
            <div class="grid grid-cols-2 items-center justify-center gap-2">
                <div class="col-span-2 md:col-span-1">
                    <x-label for="marital_status" value="{{ __('Marital status') }}" />
                    <x-select wire:model.live="marital_status" id="marital_status" class="mt-1 block w-full">
                        <option value="">choose marital status</option>
                        <option value="single" @if ($user->gender === 'single') {{ 'selected' }} @endif>Single
                        </option>
                        <option value="married" @if ($user->gender === 'married') {{ 'selected' }} @endif>Married
                        </option>
                        <option value="divorced" @if ($user->gender === 'divorced') {{ 'selected' }} @endif>Divorced
                        </option>
                        <option value="others" @if ($user->gender === 'others') {{ 'selected' }} @endif>Others
                        </option>
                    </x-select>
                    <x-input-error for="marital_status" class="mt-1" />
                </div>
                <div class="col-span-2 md:col-span-1">
                    <x-label for="occupation" value="{{ __('Occupation') }}" />
                    <x-input type="text" wire:model.live="occupation" class="mt-2 block w-full" />
                    <x-input-error for="occupation" class="mt-1" />
                </div>
            </div>
            <div class="flex justify-end items-center">
                <x-action-message on="savedDemographic" />
                <x-secondary-button class="ml-3" wire:click="saveDemographic">Save</x-secondary-button>
            </div>
        </div>
        <hr><br><br>
        {{-- contact information --}}
        <div class="space-y-6 mb-4">
            <h2 class="futura-medium text-lg">Contact information</h2>
            <div class="grid grid-cols-2 items-center justify-center gap-2">
                <div class="col-span-2">
                    <x-label for="address" value="{{ __('Address') }}" />
                    <x-input type="text" wire:model.live="address" class="mt-2 block w-full" />
                    <x-input-error for="address" class="mt-1" />
                </div>
                <div class="col-span-2 md:col-span-1">
                    <x-label for="phone" value="{{ __('Phone') }}" />
                    <x-input type="text" wire:model.live="phone" class="mt-2 block w-full" />
                    <x-input-error for="phone" class="mt-1" />
                </div>
                <div class="col-span-2 md:col-span-1">
                    <x-label for="city" value="{{ __('City') }}" />
                    <x-input type="text" wire:model.live="city" class="mt-2 block w-full" />
                    <x-input-error for="city" class="mt-1" />
                </div>
            </div>
            <div class="grid grid-cols-2 items-center justify-center gap-2">
                <div class="col-span-2 md:col-span-1">
                    <x-label for="country" value="{{ __('Country of residence') }}" />
                    <x-input type="text" wire:model.live="country" class="mt-2 block w-full" />
                    <x-input-error for="country" class="mt-1" />
                </div>
                <div class="col-span-2 md:col-span-1">
                    <x-label for="nationality" value="{{ __('Nationality') }}" />
                    <x-input type="text" wire:model.live="nationality" class="mt-2 block w-full" />
                    <x-input-error for="nationality" class="mt-1" />
                </div>
            </div>
            <div class="flex justify-end items-center">
                <x-action-message on="savedContact" />
                <x-secondary-button class="ml-3" wire:click="saveContact">Save</x-secondary-button>
            </div>
        </div>
    </div>
</div>
