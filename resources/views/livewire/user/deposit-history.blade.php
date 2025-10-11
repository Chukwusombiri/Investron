<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
            <div
                class="p-6 pb-0 mb-0 rounded-t-2xl flex justify-between items-center flex-wrap">
                <h6 class="text-xl frank-bold mb-6 md:mb-0">Deposit History</h6>
                <x-link-two href="{{route('user.deposit.pricingTable')}}" class="rounded-xl text-xs">Deposit</x-link-two>
            </div>
            <div class="my-10 w-full px-2 flex items-center">
                <div class="w-full relative border h-12 shadow p-4 rounded-full flex items-center">
                    <input type="text" wire:model.live="search"
                        class="w-full appearance-none border-none outline-none focus:outline-none focus:border-none focus:ring-transparent"
                        placeholder="Filter by plan, wallet, amount">
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
                    <table
                        class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-primary-500 opacity-70">
                                    Amount</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-primary-500 opacity-70">
                                    Plan</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-primary-500 opacity-70">
                                    Wallet</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-primary-500 opacity-70">
                                    Created</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-primary-500 opacity-70">
                                    Status</th>
                                <th
                                    class="px-6 py-3 font-semibold text-left bg-transparent border-b border-collapse border-solid shadow-none text-xxs uppercase tracking-none whitespace-nowrap text-primary-500 opacity-70">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($deposits) > 0)
                                @foreach ($deposits as $deposit)
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <p
                                                        class="font-semibold mb-0 text-sm leading-tight text-slate-700">
                                                        ${{ number_format($deposit->amount) }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-sm font-semibold leading-tight">
                                                {{ $deposit->plan }}</p>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal text-left align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-sm font-semibold leading-tight">
                                                {{ $deposit->wallet }}</p>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-light text-sm font-semibold leading-tight text-slate-900">{{ date('M d, Y | H:i', strtotime($deposit->created_at)) }}</span>
                                        </td>

                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-serif text-sm font-semibold leading-tight text-slate-700">
                                                @if ($deposit->isApproved)
                                                    <span
                                                        class="frank-regular text-emerald-400 bg-emerald-50 p-2 rounded-xl">approved</span>
                                                @else
                                                    <span
                                                        class="frank-regular text-yellow-600 bg-yellow-50 p-2 rounded-xl">pending</span>
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            @if ($deposit->receipt != null)
                                                <a href="{{ asset('storage/' . $deposit->receipt) }}" target="_blank"
                                                    class="text-sm font-semibold leading-tight text-slate-400 mr-2 hover:underline">View
                                                    receipt</a>
                                            @else
                                                <a href="{{ route('user.deposit.upload', [$deposit->id]) }}"
                                                    class="hover:underline text-sm text-slate-600 font-semibold leading-tight">Upload
                                                    receipt</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="p-4">
                    {{ $deposits->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
