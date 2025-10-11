<x-admin-layout>
    <x-admin-nav></x-admin-nav>
    <x-admin-sidebar></x-admin-sidebar>
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 capitolium">Member activity</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Back</a></li>
                            <li class="breadcrumb-item active">members</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="flex justify-between flex-wrap items-center mb-4">
                    <h2 class="capitolium text-lg text-gray-700">Transactions</h2>
                    <a href="{{route('admin.user.account',[$user])}}" class="bg-gray-800 text-primary-50 azo-sans text-xs uppercase px-4 py-2.5 rounded-2xl hover:text-primary-50 hover:bg-primary-400 hover:-translate-y-0.5 transition duration-300 ease">view portfolio</a>
                </div>
                {{-- deposits --}}
                <div class="w-full" id="deposits">
                    <div
                        class="relative mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                        <div
                            class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center flex-wrap">
                            <h6 class="text-2xl capitolium">Deposit History</h6>
                            <button
                                class="azo-sans rounded-full border border border-neutral-900 px-4 py-1 bg-neutral-900 text-gray-100"
                                onclick="Livewire.dispatch('openModal',{component:'admin.add-user-deposit', arguments: { user: '{{ $user->id }}' }})">
                                create
                            </button>
                        </div>
                        @livewire('admin.manage-user-deposits', ['user' => $user])
                    </div>
                </div>
                {{-- withdrawal --}}
                <div class="w-full" id="deposits">
                    <div
                        class="relative mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                        <div
                            class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center flex-wrap">
                            <h6 class="text-2xl capitolium">Withdrawal History</h6>
                            <button
                                class="azo-sans rounded-full border border border-neutral-900 px-4 py-1 bg-neutral-900 text-gray-100"
                                onclick="Livewire.dispatch('openModal',{component:'admin.add-user-withdrawal', arguments: { userId: '{{ $user->id }}' }})">
                                create
                            </button>
                        </div>
                        @livewire('admin.manage-user-withdrawal', ['user' => $user])
                    </div>
                </div>
                {{-- wallets --}}
                <div class="w-full" id="deposits">
                  <div
                      class="relative mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                      <div
                          class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center flex-wrap">
                          <h6 class="text-2xl capitolium">Payment methods</h6>
                          <button
                              class="azo-sans rounded-full border border border-neutral-900 px-4 py-1 bg-neutral-900 text-gray-100"
                              onclick="Livewire.dispatch('openModal',{component:'admin.add-user-wallet', arguments: { user: '{{ $user->id }}' }})">
                              New Wallet
                          </button>
                      </div>
                      @livewire('admin.manage-user-wallet', ['user' => $user])
                  </div>
              </div>
              {{-- Referrals --}}
              <div class="w-full" id="referrals">
                <div
                    class="relative mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div
                        class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center flex-wrap">
                        <h6 class="text-2xl capitolium">User referrals</h6>                       
                    </div>
                    @livewire('admin.manage-user-referrals', ['user' => $user])
                </div>
            </div>
            </div>
        </section>
    </div>
    <x-admin-footer></x-admin-footer>
</x-admin-layout>

<script>
    Livewire.on('approvedDeposit', (e) => {
        toastr.success('Deposit approval was successful')
    })
    Livewire.on('approvedWithdrawal', (e) => {
        toastr.success('withdrawal approved successfully')
    })

    Livewire.on('addedDeposit', (e) => {
        toastr.success('Deposit completed and approval email sent.')
    })

    Livewire.on('addedUserWithdrawal', (e) => {
        toastr.success('Withdrawal record was created successfully.')
    })

    Livewire.on('editedWithdrawal', (e) => {
        toastr.success('Withdrawal was edited.')
    })

    Livewire.on('editedDeposit', (e) => {
        toastr.success('Deposit was edited.')
    })

    Livewire.on('deletedWithdrawal', (e) => {
        toastr.success('withdrawal record was deleted.')
    })

    Livewire.on('deletedDeposit', (e) => {
        toastr.success('Deposit record was deleted.')
    })

    Livewire.on('addedUserWallet', (e) => {
        toastr.success('User\'s wallet added.')
    })

    Livewire.on('deletedUserWallet', (e) => {
        toastr.success('User\'s wallet deleted.')
    })

    Livewire.on('editedUserWallet', (e) => {
        toastr.success('User\'s wallet edited.')
    })
    Livewire.on('receiptDeleted', (e) => {
        toastr.success('Deposit receipt deleted.')
    })
    Livewire.on('rewardedUpline',e => {
        toastr.success('Successful! Referral bonus added.');
    })  
    Livewire.on('deletedReferral',e => {
        toastr.success('Referral record was deleted. confirmed..');
    })  
</script>
