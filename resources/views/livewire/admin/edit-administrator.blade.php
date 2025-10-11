<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
            {{-- header --}}
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="text-xl futura-medium">Update administrator account</h6>
            </div>
            {{-- main --}}
            <div class="w-full px-6">
                <div class="flex flex-col px-2 py-4">                     
                    @if ($photo)
                        <span class="font-semibold">Photo:</span>
                        <img class="rounded-full mt-2 h-24 w-24 shadow" src="{{ $photo->temporaryUrl() }}">
                    @else
                        <span class="font-semibold">Photo:</span>
                        <img class="rounded-full mt-2 h-24 w-24 shadow" src="{{$admin->profile_photo_path!==null ? asset('storage/'. $admin->profile_photo_path) : asset('storage/admin-photos/admin.jpg')}}" alt="Profile photo" />
                    @endif
                    <x-input-error for="photo" class="mt-2"/>
                    <p class="futura-light text-sm mt-2">Always remember to save after selecting the new image to be uploaded.</p>
                    <div class="flex" x-data>
                        <div class="flex mt-2 mr-4">
                            <button x-on:click.prevent="$refs.photo.click()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Upload
                            </button>
                            <input class="hidden" type="file" id="profile_image" wire:model.live="photo" x-ref="photo">       
                        </div>                        
                        @if ($admin->profile_photo_path!==null)
                        <div class="flex mt-2">
                            <button class="mr-4 inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" 
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
                <div class="w-full max-w-full grid grid-cols-4 gap-6 mb-6">
                    <div class="col-span-4 md:col-span-2">
                        <x-label for="username" value="{{__('Full name')}}"/>
                        <x-input type="text" wire:model.live="username" id="username" placeholder="Enter full name" class="block w-full mt-2"/>
                        <x-input-error for="username" />
                    </div>
                    <div class="col-span-4 md:col-span-2">
                        <x-label for="email" value="{{__('E-Mail address')}}"/>
                        <x-input type="text" wire:model.live="email" placeholder="Enter email address" class="block w-full mt-2"/>                            
                        <x-input-error for="email" />
                    </div>
                </div>
                <p class="futura-light col-span-4 text-md">If you don't want to change this admin's password, skip passwords field.</p>
                <div class="w-full max-w-full grid grid-cols-4 gap-6 mb-6">                    
                    <div class="col-span-4 md:col-span-2">
                        <x-label for="password" value="{{__('Change Password')}}" />
                        <x-input type="password" wire:model.live="password" placeholder="Enter password" class="block w-full mt-2"/>
                        <x-input-error for="password" />
                    </div>
                    <div class="col-span-4 md:col-span-2">
                        <x-label for="password_confirmation" value="{{__('Confirm password')}}"/>
                        <x-input type="password" wire:model.live="password_confirmation" placeholder="Repeat new password" class="block w-full mt-2"/>                        
                        <x-input-error for="password_confirmation" />
                    </div>
                </div> 
                <div class="w-full max-w-full grid grid-cols-4 gap-6">
                    <div class="col-span-4 md:col-span-2">
                        <x-label for="admin_role" value="{{__('Admin role')}}"/>
                        <x-select wire:model.live="admin_role" id="admin_role" class="block w-full mt-2">                            
                            @foreach ($roles as $key => $role)
                                <option value="{{ $role }}">{{ $key }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="admin_role" />
                    </div>
                    <div class="col-span-4 md:col-span-2">
                        <x-label value="{{__('Account status')}}"/>
                        <label for="isSuspended" class="w-fullflex items-center">
                            <input type="checkbox" wire:model.live="isSuspended" id="isSuspended"
                                class="size-5 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                            <span class="ml-2">
                                Is admin suspended?
                            </span>
                        </label>
                        <x-input-error for="isSuspended" />
                    </div>
                </div>
                <div class="w-full max-w-full px-3 shrink-0 md:flex-0 flex justify-end my-10">
                    <button wire:click="save" type="button"
                        class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-gray-700 lg:block tracking-wide hover:shadow-xs hover:-translate-y-px active:opacity-85">update account</button>
                </div> 
            </div>
        </div>
    </div>
</div>