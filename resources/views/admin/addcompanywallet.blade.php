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
                        <h1 class="m-0 sedan-regular">Company Wallet</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{ route('admin.company_wallets') }}">Back</a></li>

                            <li class="breadcrumb-item active">wallets</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="flex flex-col items-center px-4">
                    <div class="w-full md:w-7/12 md:py-6">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Add New Wallet</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <x-admin-alert class="mb-4"/>
                                <!-- form start -->
                                <form method="POST" action="{{ route('admin.company_wallet.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf                                    
                                    <div class="w-full">
                                        <x-label for="name" value="{{__('Wallet name')}}"/>
                                        <x-input type="text" class="block w-full mt-1" id="name" name="name" value="{{ old('name') }}" required />
                                        <x-input-error for="name" />
                                    </div>
                                    <div class="w-full mt-4">
                                      <x-label for="address" value="{{__('Wallet address')}}"/>
                                      <x-input type="text" class="block w-full mt-1" id="address" name="address" value="{{ old('address') }}" required />
                                      <x-input-error for="address" />                                        
                                    </div>
                                    <div class="flex justify-end items-center py-2 mt-4">
                                      <button type="submit" class="bg-gray-700 px-4 py-2 rounded-xl focus:bg-neutral-900 hover:bg-neutral-900 text-neutral-100">create</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
        </section>
    </div>
    <x-admin-footer></x-admin-footer>
</x-admin-layout>
