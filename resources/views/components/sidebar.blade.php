<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-x-hidden overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
  <div class="relative h-19 flex items-center juatify-center bg-primary-500">
    <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer text-primary-200 xl:hidden" sidenav-close>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
        <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
      </svg>      
    </i>
    
    <a class="block px-8 m-0 text-sm whitespace-nowrap text-slate-100" href="{{route('guest_home')}}">
      <h2 class="text-2xl frank-bold overflow-hidden text-center text-primary-50">{{substr(config('app.name'),0, strpos(config('app.name'),' '))}}</h2>
    </a>
  </div>

  <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

  <div class="frank-regular items-center block w-auto min-h-screen overflow-y-auto overflow-x-hidden{{-- h-sidenav --}} grow basis-full">
    <ul class="flex flex-col pl-0 mb-0">
      <li class="mt-0.5 w-full">
        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('guest_home')}}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 relative top-0 text-sm leading-normal text-neutral-900">
              <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>            
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Return Home</span>
        </a>
      </li>
      <li class="mt-0.5 w-full">
        <a class="@if(request()->routeIs('user.dashboard')) rounded-lg font-semibold text-slate-700 bg-blue-500/13 @endif py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('user.dashboard')}}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-neutral-900 ni ni-tv-2"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
        </a>
      </li>
      <li class="mt-0.5 w-full">
        <a class="@if(request()->routeIs('user.payments') || strpos(request()->route()->getName(),'user.payment')!==false) rounded-lg font-semibold text-slate-700 bg-blue-500/13 @endif py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('user.payments')}}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 relative top-0 text-sm leading-normal text-neutral-900">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
            </svg>            
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Payments</span>
        </a>
      </li>
      <li class="mt-0.5 w-full">
        <a class="@if(request()->routeIs('user.deposit.pricingTable') || strpos(request()->route()->getName(),'deposit.complete')!==false || strpos(request()->route()->getName(),'deposit.create')!==false) rounded-lg font-semibold text-slate-700 bg-blue-500/13 @endif py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('user.deposit.pricingTable')}}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 relative top-0 text-sm leading-normal text-neutral-900">
              <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
            </svg>                    
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Deposit</span>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class="@if(request()->routeIs('user.deposits') || strpos(request()->route()->getName(),'deposit.upload')!==false) rounded-lg font-semibold text-slate-700 bg-blue-500/13 @endif py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('user.deposits')}}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 relative top-0 text-sm leading-normal text-neutral-900">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg> 
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Deposit history</span>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class="@if(request()->routeIs('user.withdrawal.create')) rounded-lg font-semibold text-slate-700 bg-blue-500/13 @endif py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('user.withdrawal.create')}}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-neutral-900 ni ni-credit-card"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Withdrawal</span>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class="@if(request()->routeIs('user.withdrawals')) rounded-lg font-semibold text-slate-700 bg-blue-500/13 @endif py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('user.withdrawals')}}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 relative top-0 text-sm leading-normal text-neutral-900">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
            </svg>            
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Withdrawal history</span>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class="@if(request()->routeIs('user.transactions')) rounded-lg font-semibold text-slate-700 bg-blue-500/13 @endif  py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('user.transactions')}}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-neutral-900 ni ni-single-copy-04"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Transactions</span>
        </a>
      </li>        
      <li class="mt-0.5 w-full">
        <a class="@if(request()->routeIs('user.referrals') || strpos(request()->route()->getName(),'user.referrals')!==false) rounded-lg font-semibold text-slate-700 bg-blue-500/13 @endif py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('user.referrals')}}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 relative top-0 text-sm leading-normal text-neutral-900">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
            </svg>                     
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Referrals & rewards</span>
        </a>
      </li>
      <li class="w-full mt-4">
        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Account</h6>
      </li>

      <li class="mt-0.5 w-full">
        <a class="@if(request()->routeIs('profile.edit')) rounded-lg font-semibold text-slate-700 bg-blue-500/13 @endif py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('profile.edit') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Setting</span>
        </a>
      </li>
      
      <li class="mt-0.5 w-full">
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <button type="submit" class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-neutral-900 ni ni-button-power"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign Out</span>
          </button>
        </form>          
      </li>
     
      <li class="mt-0.5 w-full">
        <div class="flex flex-col py-2.7 text-sm ease-nav-brand my-0 mx-2 whitespace-nowrap px-4 transition-colors">
          <h2 class="text-xl mb-4">Questions?</h2>
          <p class="mb-2"><a href="{{route('contact')}}" class="hover:underline">Email: {{config('mail.mainTo.address')}}</a></p>
          <p class="mb-2">
            <a href="" class="hover:underline inline-flex items-center">
              <span class="mr-2">Use Livechat</span>
              <span class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
              </span>
            </a>
          </p>
        </div>         
      </li>        
    </ul>    
  </div>    
</aside>