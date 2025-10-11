<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl  rounded-2xl bg-clip-border">
            <div
                class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between flex-wrap">
                <h6 class="text-xl futura-medium mb-6 md:mb-0">Referrals and rewards</h6>
                <div class="flex flex-col">
                    <h6 class="text-futura-book mb-2 md:mb-4">Referral link</h6>
                    <div class="w-full p-1 border rounded-xl border-primary text-primary bg-primary-white shadow-md w-full flex items-center flex-nowrap"
                        x-data="{
                            isClicked: false,
                            copyToClipboard: function() {
                                var input = $refs.input;
                        
                                input.select();
                                input.setSelectionRange(0, 99999);
                        
                                document.execCommand('copy');
                                this.isClicked = true;
                        
                                setTimeout(() => {
                                    this.isClicked = false;
                                }, 3000)
                            }
                        }">
                        <input readonly
                            class="appearance-none w-10/12 outline-none focus:outline-none border-none bg-primary-white p-2 text-primary focus:outline-0 focus:border-0 focus:ring-0 active:ring-0 active:border-0 active:outline-0"
                            type="text" x-ref="input"
                            value="{{ config('app.url').'/register?ref=' . auth()->user()->referralId }}">
                        <button x-on:click="copyToClipboard()" x-on:click="isClicked = ! isClicked" class="w-2/12">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                :class="{ 'hidden': isClicked, 'inline-flex': !isClicked }"
                                class="w-9 h-9 inline-flex">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                :class="{ 'hidden': !isClicked, 'inline-flex': isClicked }" class="w-9 h-9 hidden">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex flex-col px-6 mt-6">
                <h4 class="futura-medium text-md lg:text-xl tracking-wide">Total referral bonus: ${{ number_format(auth()->user()->downlines()->sum('bonus')) }}</h4>
                <h4 class="futura-medium text-md lg:text-xl tracking-wide">Current referral bonus: ${{ number_format(auth()->user()->refBonus) }}</h4>
            </div>
            <div class="my-10 w-full px-2 flex items-center">
                <div class="w-full relative border h-12 shadow p-4 rounded-full flex items-center">
                    <input type="text" wire:model.live="search"
                        class="w-full appearance-none border-none outline-none focus:outline-none focus:border-none focus:ring-transparent"
                        placeholder="Filter by username or reward">
                    <button wire:click="clear" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-square-rounded-x-filled text-gray-500 hover:text-gray-600 h-7 w-7 fill-current"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z"
                                fill="currentColor" stroke-width="0" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="w-10 text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-neutral-900 opacity-70">
                                </th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-neutral-900 opacity-70">
                                    Downline</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-neutral-900 opacity-70">
                                    Group</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-neutral-900 opacity-70">
                                    Bonus</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-neutral-900 opacity-70">
                                    Joined</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-neutral-900 opacity-70">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($referrals) > 0)
                                @foreach ($referrals as $r => $referral)
                                    <tr>
                                        <td
                                            class="w-10 p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                {{ $r + 1 }}
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-sm font-semibold leading-tight">
                                                {{ $referral->downlineUsername }}</p>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-sm font-semibold leading-tight">
                                                Level {{ $referral->level }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-sm font-semibold leading-tight">
                                                ${{ number_format($referral->bonus) }}</p>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span
                                                class="text-sm futura-light leading-tight text-neutral-900">{{ date('M d, Y', strtotime($referral->updated_at)) }}</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span class="font-serif text-sm font-semibold leading-tight text-slate-700">
                                                @if ($referral->bonus > 0)
                                                    <span
                                                        class="futura-book text-emerald-400 bg-emerald-50 p-2 rounded-xl">Active</span>
                                                @else
                                                    <span
                                                        class="futura-book text-yellow-600 bg-yellow-50 p-2 rounded-xl">Dormant</span>
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="p-4">
                    {{ $referrals->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
