<x-action-section>
    <x-slot name="title">
        {{ __('Delete Account') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Permanently delete your account.') }}
    </x-slot>

    <x-slot name="content">
        <div {{-- x-data="{ isOpen: $wire.entangle('isOpen').live }" --}}>
            <div class="max-w-xl text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </div>

            <div class="mt-5">
                <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>

            {{-- <div x-show="isOpen"
                class="fixed inset-0 z-50 px-8 bg-gray-900 bg-opacity-20 flex flex-col items-center justify-center md:justify-start">
                <div class="w-full max-w-lg mx-auto bg-primary-50 text-primary-500">
                    <!-- Delete User Confirmation Modal -->
                    <x-dialog-modal wire:model="confirmingUserDeletion">
                        <x-slot name="title">
                            {{ __('Delete Account') }}
                        </x-slot>

                        <x-slot name="content">
                            {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                            <div class="mt-4" x-data="{}"
                                x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                                <x-input type="password" class="mt-1 block w-3/4" autocomplete="current-password"
                                    placeholder="{{ __('Password') }}" x-ref="password" wire:model="password"
                                    wire:keydown.enter="deleteUser" />

                                <x-input-error for="password" class="mt-2" />
                            </div>
                        </x-slot>

                        <x-slot name="footer">
                            <x-secondary-button wire:click="$toggle('confirmingUserDeletion')"
                                wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                                {{ __('Delete Account') }}
                            </x-danger-button>
                        </x-slot>
                    </x-dialog-modal>
                </div>
            </div> --}}
            <x-dialog-modal wire:model="confirmingUserDeletion">
                <x-slot name="title">
                    {{ __('Delete Account') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                    <div class="mt-4" x-data="{}"
                        x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                        <x-input type="password" class="mt-1 block w-3/4" autocomplete="current-password"
                            placeholder="{{ __('Password') }}" x-ref="password" wire:model="password"
                            wire:keydown.enter="deleteUser" />

                        <x-input-error for="password" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button wire:click="$toggle('confirmingUserDeletion')"
                        wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </x-slot>
            </x-dialog-modal>
        </div>
    </x-slot>
</x-action-section>
