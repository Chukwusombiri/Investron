<div class="relative bg-white rounded-xl mb-10">
  <div wire:loading.delay.long wire:target="approve">
      <div class="absolute top-1/2 left-1/2 h-24 w-24 flex" style="transform: translate(-50%, -50%);">
          <div class="relative rounded-full w-full h-full border-t-8 border-b-8 border-blue-500 animate-spin"></div>
      </div>
  </div>
  <div
      class="p-6 flex justify-between items-center flex-wrap">
      <h4 class="text-lg font-semibold ">Withdrawal history</h4>      
  </div>
  <x-admin-alert /> 
  {{-- search --}}
  <div class="my-10 w-full px-4 flex items-center">
      <div class="w-full relative border h-12 shadow p-4 rounded-full flex items-center">
          <input type="text" wire:model.live="search"
              class="w-full appearance-none border-none outline-none focus:outline-none focus:border-none focus:ring-transparent"
              placeholder="Filter by username, wallet or amount">
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
  {{-- table --}}
  <div class="flex-auto px-0 pt-0 pb-2">
      <div class="p-0 overflow-x-auto">
          <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
              <thead class="align-bottom">
                  <tr>
                      <th
                          class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                          Username</th>
                      <th
                          class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                          Amount</th>
                      <th
                          class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                          Wallet</th>
                      <th
                          class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                          plan</th>
                      <th
                          class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                          Created</th>
                      <th
                          class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                          Status</th>
                      <th
                          class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none  tracking-none whitespace-nowrap text-slate-400 opacity-70">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @if (count($withdrawals) > 0)
                      @foreach ($withdrawals as $withdrawal)
                          <tr>
                              <td
                                  class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                   <p class="font-semibold mb-0 text-xs leading-tight   text-slate-700">
                                      {{ $withdrawal->user->username }} <a href="{{ route('admin.user.show', [$withdrawal->user_id]) }}" class="ml-3 futura-light text-sm underline">click to view</a>
                                  </p>
                              </td>
                              <td
                                  class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                  <div class="flex px-2 py-1">
                                      <div class="flex flex-col justify-center">
                                          <p
                                              class="font-semibold mb-0 text-xs leading-tight   text-slate-700">
                                              ${{ number_format($withdrawal->amount) }}</p>
                                      </div>
                                  </div>
                              </td>                              
                              <td
                                  class="p-2 text-sm leading-normal text-left align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                  <p class="mb-0 text-xs font-semibold leading-tight  ">
                                      {{ $withdrawal->wallet }}</p>
                              </td>
                              <td
                                  class="p-2 text-sm leading-normal text-left align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                  <p class="mb-0 text-xs font-semibold leading-tight  ">
                                      {{ $withdrawal->plan }}</p>
                              </td>
                              <td
                                  class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                  <span
                                      class="text-xs font-semibold leading-tight   text-slate-400">{{ date('M d, Y | H:i', strtotime($withdrawal->created_at)) }}</span>
                              </td>

                              <td
                                  class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                  <span
                                      class="font-serif text-sm font-semibold leading-tight   text-slate-700">
                                      @if ($withdrawal->isApproved)
                                          <span
                                              class="futura-book text-emerald-400 bg-emerald-50 p-2 rounded-xl">approved</span>
                                      @else
                                          <span
                                              class="futura-book text-yellow-600 bg-yellow-50 p-2 rounded-xl">pending</span>
                                      @endif
                                  </span>
                              </td>
                              <td
                                  class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
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
                                              {{ __('Manage withdrawal') }}
                                          </div>
                                          @if (!$withdrawal->isApproved)
                                              <button
                                                  class="flex item-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                                  wire:click="approve('{{ $withdrawal->id }}')">
                                                  <span class="mr-2">
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                          class="icon icon-tabler icon-tabler-discount-check-filled w-5 h-5"
                                                          width="40" height="40" viewBox="0 0 24 24"
                                                          stroke-width="1.5" stroke="#000000" fill="none"
                                                          stroke-linecap="round" stroke-linejoin="round">
                                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                          <path
                                                              d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944zm3.697 7.282a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                                                              stroke-width="0" fill="currentColor" />
                                                      </svg>
                                                  </span>
                                                  Approve
                                              </button>
                                              <button
                                                  class="flex item-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                                  wire:click='$dispatch("openModal",{component: "admin.edit-withdrawal",arguments: {withdrawalId: "{{$withdrawal->id}}"}})'>
                                                  <span class="mr-2">
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                          class="icon icon-tabler icon-tabler-edit w-5 h-5"
                                                          width="40" height="40" viewBox="0 0 24 24"
                                                          stroke-width="1.5" stroke="#000000" fill="none"
                                                          stroke-linecap="round" stroke-linejoin="round">
                                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                          <path
                                                              d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                          <path
                                                              d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                          <path d="M16 5l3 3" />
                                                      </svg>
                                                  </span>
                                                  Edit
                                              </button>
                                          @endif
                                          <button
                                              class="flex item-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                              wire:click="delete('{{ $withdrawal->id }}')">
                                              <span class="mr-2">
                                                  <svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-trash-x w-5 h-5"
                                                      width="40" height="40" viewBox="0 0 24 24"
                                                      stroke-width="1.5" stroke="#000000" fill="none"
                                                      stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path d="M4 7h16" />
                                                      <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                      <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                      <path d="M10 12l4 4m0 -4l-4 4" />
                                                  </svg>
                                              </span>
                                              Delete withdrawal
                                          </button>
                                      </x-slot>
                                  </x-dropdown>
                              </td>
                          </tr>
                      @endforeach
                  @endif
              </tbody>
          </table>
      </div>
      <div class="p-4">
          {{ $withdrawals->links() }}
      </div>
  </div>
</div>