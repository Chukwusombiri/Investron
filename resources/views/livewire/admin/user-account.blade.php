<div class="frank-regular">
    <div class="bg-gray-100 p-4 md:px-6 md:py-4">
        <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
            <h3 class="frank-bold text-lg leading-6 text-gray-900">
                {{ $user->username }}'s Portfolio            
            </h3>
            <a href="{{route('admin.user.show',[$user])}}" class="bg-gray-900 px-4 py-2 text-gray-100 outline-none rounded-xl hover:text-gray-100 transition hover:-translate-y-0.5 duration-300 ease">View Transactions</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6 md:mb-10">
            <div
                class="flex flex-col items-center p-3 bg-primary-50 rounded-lg border border-gray-300 hover:border-blue-500 shadow">
                <h2 class="capitolium text-xl font-semibold mb-2"> ${{ number_format($user->acRoi) }}</h2>
                <h4 class="text-sm azo-sans">Return on investment</h4>
            </div>
            <div
                class="flex flex-col items-center p-3 bg-primary-50 rounded-lg border border-gray-300 hover:border-blue-500 shadow">
                <h2 class="capitolium text-xl font-semibold mb-2"> ${{ number_format($user->acBal) }}</h2>
                <h4 class="text-sm azo-sans">Active capital</h4>
            </div>
            <div
                class="flex flex-col items-center p-3 bg-primary-50 rounded-lg border border-gray-300 hover:border-blue-500 shadow">
                <h2 class="capitolium text-xl font-semibold mb-2"> ${{ number_format($user->perMonRoi) }}</h2>
                <h4 class="text-sm azo-sans">Monthly performance</h4>
            </div>
            <div
                class="flex flex-col items-center p-3 bg-primary-50 rounded-lg border border-gray-300 hover:border-blue-500 shadow">
                <h2 class="capitolium text-xl font-semibold mb-2"> ${{ number_format($user->refBonus) }}</h2>
                <h4 class="text-sm azo-sans">Referral income</h4>
            </div>
        </div>
        <div class="flex flex-col gap-3.5">
            <h4 class="mb-2 text-md">Total deposits:
                ${{ number_format($user->deposits->sum('amount')) }}<a
                    href="{{ route('admin.user.show', [$user]) . '#deposits' }}" class="ml-3 underline text-sm text-blue-500">View
                    deposits</a></h4>
            <h4 class="mb-2 text-md">Total withdrawals:
                ${{ number_format($user->withdrawals->sum('amount')) }}<a
                    href="{{ route('admin.user.show', [$user->id]) . '#withdrawals' }}" class="ml-3 underline text-sm text-blue-500 ">View
                    withdrawals</a></h4>
            <h4 class="mb-2 text-md">Total referral income:
                ${{ number_format($user->downlines()->sum('bonus')) }}<a
                    href="{{ route('admin.user.show', [$user->id]) . '#referrals' }}" class="ml-3 underline text-sm text-blue-500">View
                    referral history</a></h4>
            <h4 class="mb-10 text-md ">Total payment method: {{ $user->userwallets->count() }}<a href="#wallet"
                    class="ml-3 underline text-sm text-blue-500">View payment methods</a></h4>

        </div>

        <div class="mt-4 border-b border-gray-300 pb-2.5">
            <h4 class="text-md frank-bold mb-2">Active Plans</h4>
            <ul role="list" class="list-decimal space-y-2 divide-y divide-gray-300 w-full max-w-lg" x-data="{ activePlan: null }">
                @if ($user->plans)
                    @foreach ($user->plans as $plan)
                        <li class="py-1.5">
                            <div class="flex justify-between items-center flex-wrap gap-2 md:gap-4">
                                <span class="text-sm font-semibold">{{ $plan->name }}</span>
                                <div class="flex gap-4 text-sm">
                                    <span>${{ number_format($plan->subscription->roi) }} (R.O.I)</span>
                                    <span>${{ number_format($plan->subscription->total) }} (Capital)</span>
                                </div>
                                <button 
                                    class="text-blue-500 text-xs uppercase flex items-center" 
                                    x-on:click="activePlan = activePlan === '{{ $plan->subscription->id }}' ? null : '{{ $plan->subscription->id }}'">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                      </svg>
                                      
                                    edit
                                </button>
                            </div>
                            <div x-show="activePlan === '{{ $plan->subscription->id }}'" class="py-4"  x-data="{ total: '{{$plan->subscription->total}}', roi: '{{$plan->subscription->roi}}' }">
                                <div class="flex flex-wrap gap-3">
                                    <div class="w-full md:max-w-1/2">
                                        <label for="total" class="text-xs font-light">R.O.I</label>
                                        <input type="number" x-model="roi" name="roi" class="appearance-none block w-full border border-gray-400 focus:ring-0 focus:border-blue-500 rounded p-1 placeholder:text-gray-600 text-primary-500 bg-transparent"/>
                                        <x-input-error for="roi" class="mt-1" />
                                    </div>
                                    <div class="w-full md:max-w-1/2">
                                        <label for="total" class="text-xs font-light">Capital</label>
                                        <input type="number" x-model="total" id="total" name="total" class="appearance-none block w-full border border-gray-400 focus:ring-0 focus:border-blue-500 rounded p-1 placeholder:text-gray-600 text-primary-500 bg-transparent"/>
                                        <x-input-error for="total" class="mt-1" />
                                    </div>
                                </div>
                                <div class="flex justify-center md:justify-end items-center flex-wrap mt-3.5">
                                    <x-action-message on="savedEditPerPlan" class="w-full md:w-auto text-center mb-1 md:mb-0"/>                                   
                                    <button x-on:click="activePlan=null" class="outline-none mb-2 md:mb-0 md:ml-3 text-rose-600 bg-gray-800 underline px-5 py-2 azo-sans text-xs uppercase rounded-xl">close</button>
                                    <button class="outline-none mb-2 md:mb-0 md:ml-3 bg-blue-500 text-primary-50 px-5 py-2 text-xs azo-sans font-semibold uppercase border-0 rounded-xl" 
                                    x-on:click="$wire.editPerPlan('{{$plan->id}}',total,roi)">Save</button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>            
        </div>
        <div class="mt-4">
            <x-label for="acRoi" value="{{ __('Edit Total ROI') }}" />
            <div class="flex flex-nowrap mb-2">
                <input type="number" id="acRoi" wire:model.live="acRoi" placeholder="Enter amount to add"
                    class="w-7/12 px-4 py-2 rounded-l-lg focus:shadow-primary-outline text-sm leading-5.6 ease appearance-none border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-0 focus:outline-none">
                <button type="button" wire:click='editRoi'
                    class="px-7 py-2 rounded-r-lg font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 cursor-pointer text-xs bg-cyan-500 hover:shadow-xs active:opacity-85 ">
                    Save
                </button>
            </div>
            <x-action-message on="savedRoi" />
            <x-input-error for="acRoi" class="mt-1" />
        </div>
        <div class="mt-4">
            <x-label for="acBal" value="{{ __('Edit Total Capital') }}" />
            <div class="flex flex-nowrap mb-2">
                <input type="number" id="acBal" wire:model.live="acBal" placeholder="Enter amount to add"
                    class="w-7/12 px-4 py-2 rounded-l-lg focus:shadow-primary-outline  text-sm leading-5.6 ease appearance-none border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-0 focus:outline-none">
                <button type="button" wire:click='editCapital'
                    class="px-7 py-2 rounded-r-lg font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 cursor-pointer text-xs bg-cyan-500 hover:shadow-xs active:opacity-85 ">
                    Save
                </button>
            </div>
            <x-action-message on="savedCapital" class="text-emerald-500" />
            <x-input-error for="acBal" class="mt-1" />
        </div>
        {{-- edit perMonRoi --}}
        <div class="mt-4">
            <x-label for="perMonRoi" value="{{ __('Edit monthly performance') }}" />
            <div class="flex flex-nowrap mb-2">
                <input type="number" id="perMonRoi" wire:model.live="perMonRoi" placeholder="Enter amount to add"
                    class="w-7/12 px-4 py-2 rounded-l-lg focus:shadow-primary-outline  text-sm leading-5.6 ease appearance-none border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-0 focus:outline-none">
                <button type="button" wire:click='editPerMonRoi'
                    class="px-7 py-2 rounded-r-lg font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 cursor-pointer text-xs bg-cyan-500 hover:shadow-xs active:opacity-85 ">
                    Save
                </button>
            </div>
            <x-action-message on="savedPerMonRoi" class="text-emerald-500" />
            <x-input-error for="perMonRoi" class="mt-1" />
        </div>
        {{-- add profit --}}
        <div class="mt-4">
            <x-label for="plusRoi" value="{{ __('Add profit') }}" />
            <p class="text-sm mb-2 w-full md:max-w-xl">"Add profit" will update the User's monthly performance value and ROI value by
                adding inputed amount to both fields.</p>
            <div class="flex flex-nowrap mb-2">
                <input type="text" id="plusRoi" wire:model.live="plusRoi" placeholder="Enter amount to add"
                    class="w-7/12 px-4 py-2 rounded-l-lg focus:shadow-primary-outline  text-sm leading-5.6 ease appearance-none border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-0 focus:outline-none">
                <button type="button" wire:click='addProfit'
                    class="px-7 py-2 rounded-r-lg font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 cursor-pointer text-xs bg-cyan-500 hover:shadow-xs active:opacity-85 ">
                    Add
                </button>
            </div>
            <x-action-message on="savedProfit" />
            <x-input-error for="plusRoi" class="mt-1" />
        </div>
    </div>
</div>
