<div class="card">
    <div class="card-header">
        <h3 class="futura-medium text-lg">Users Management</h3>
    </div>
    <div class="my-10 w-full px-4 flex items-center">
        <div class="w-full relative border h-12 shadow p-4 rounded-full flex items-center">
            <input type="text" wire:model.live="search"
                class="w-full appearance-none border-none outline-none focus:outline-none focus:border-none focus:ring-transparent"
                placeholder="Filter by name or email">
            <button wire:click="clear" type="button">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-square-rounded-x-filled text-gray-500 hover:text-gray-600 h-7 w-7 fill-current"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z"
                        fill="currentColor" stroke-width="0" />
                </svg>
            </button>
        </div>
    </div>
    <!-- ./card-header -->
    <div class="card-body table-responsive">
        <div class="flex justify-between items-center mb-4">
            <button class="bg-gray-900 px-4 py-2 text-gray-100 outline-none rounded-xl"
                wire:click="$dispatch('openModal',{component: 'admin.add-user'})">create user</button>
            <select wire:model.live="sorter"
                class="focus:border-neutral-900 focus:ring-neutral-900 border border-gray-900 rounded-xl">
                <option value="asc" class="p-2">Sort by: Oldest</option>
                <option value="desc" class="p-2">Sort by: Newest</option>
            </select>
        </div>
        <table class="table table-hover table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th></th>
                    <th>Username</th>
                    <th>Registered</th>
                    <th>Last seen</th>
                    <th>state</th>
                    <th>ROI</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u => $user)
                    @if (!$user->is_admin)
                        <tr>
                            <td>
                                @if ($user->profile_photo_path !== null)
                                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="user photo"
                                        class="w-10 h-10 rounded-full">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-8">
                                        <path fill-rule="evenodd"
                                            d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </td>
                            <td>{{ $user->username ?? substr($user->email,0,strpos($user->email, '@')) }} <br>
                                <a href="{{ route('admin.getmail', ['email' => json_encode([$user->email])]) }}"
                                    class="underline flex items-center">
                                    {{ $user->email }}
                                    @if ($user->hasVerifiedEmail())
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-square-rounded-check w-5 h-4"
                                            width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="#22c55e" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 12l2 2l4 -4" />
                                            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                        </svg>
                                    @endif
                                </a>
                            </td>
                            <td>{{ date('M d, Y', strtotime($user->created_at)) }}</td>
                            <td>{{ $user->last_sign_in_at !== null ? date('M d, Y', strtotime($user->last_sign_in_at)) : date('M d, Y', strtotime($user->created_at)) }}
                            </td>
                            <td><span class="font-semibold uppercase text-sm">
                                    {{ $user->isEarning ? 'Earning' : 'Not earning' }}
                                </span>
                            </td>
                            <td><span class="font-semibold uppercase text-sm">
                                    ${{ $user->acRoi !== '0' ? number_format($user->acRoi) : '0.00' }}
                                </span>
                            </td>
                            <td class="flex justify-between items-center">
                                <a href="{{ route('admin.user.edit', [$user->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>
                                <span class="flex justify-center mt-2">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Account') }}
                                            </div>
                                            <a href="{{ route('admin.user.account', [$user]) }}"
                                                class="flex item-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                                <span class="mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                                                    </svg>
                                                </span>
                                                View Portfolio
                                            </a>
                                            <a href="{{ route('admin.user.show', [$user->id]) }}"
                                                class="flex item-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                                <span class="mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-transaction-dollar w-5 h-5"
                                                        width="40" height="40" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="#000000" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M20.8 13a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                                                        <path d="M18 11v10" />
                                                        <path d="M5 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                        <path d="M17 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                        <path d="M7 5h8" />
                                                        <path d="M7 5v8a3 3 0 0 0 3 3h1" />
                                                    </svg>
                                                </span>
                                                Transactions
                                            </a>
                                            <button
                                                class="flex item-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                                wire:click="$dispatch('openModal',{ component: 'admin.reset-password', arguments: { user: '{{$user->id}}' } })">
                                                <span class="mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-circle-key w-5 h-5"
                                                        width="40" height="40" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="#000000" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M14 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                        <path d="M21 12a9 9 0 1 1 -18 0a9 9 0 0 1 18 0z" />
                                                        <path d="M12.5 11.5l-4 4l1.5 1.5" />
                                                        <path d="M12 15l-1.5 -1.5" />
                                                    </svg>
                                                </span>
                                                Password
                                            </button>
                                            @if (!$user->hasVerifiedEmail())
                                                <button
                                                    class="flex item-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                                    wire:click='verify("{{ $user->id }}")'>
                                                    <span class="mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-shield-lock w-5 h-5"
                                                            width="40" height="40" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="#000000" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" />
                                                            <path d="M12 11m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                            <path d="M12 12l0 2.5" />
                                                        </svg>
                                                    </span>
                                                    Verify email
                                                </button>
                                            @endif
                                            @if ($user->isBanned)
                                                <button
                                                    class="flex item-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                                    onclick='Livewire.emit("openModal","admin.unban",@json([$user->id]))'>
                                                    <span class="mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-lock-x w-5 h-5"
                                                            width="40" height="40" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="#000000" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M13 21h-6a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v.5" />
                                                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                                            <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                                                            <path d="M22 22l-5 -5" />
                                                            <path d="M17 22l5 -5" />
                                                        </svg>
                                                    </span>
                                                    Un-ban user
                                                </button>
                                            @else
                                                <button
                                                    class="flex item-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                                    onclick='Livewire.emit("openModal","admin.ban",@json([$user->id]))'>
                                                    <span class="mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-lock w-5 h-5"
                                                            width="40" height="40" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="#000000" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                                                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                                            <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                                                        </svg>
                                                    </span>
                                                    Ban user
                                                </button>
                                            @endif
                                            <button
                                                class="flex item-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                                wire:click='$emit("openModal","admin.delete-user",@json([$user->id]))'>
                                                <span class="mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-user-x w-5 h-5"
                                                        width="40" height="40" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="#000000" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                                        <path d="M22 22l-5 -5" />
                                                        <path d="M17 22l5 -5" />
                                                    </svg>
                                                </span>
                                                Delete user
                                            </button>
                                        </x-slot>
                                    </x-dropdown>
                                </span>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
