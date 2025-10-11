<x-admin-layout>
    <x-admin-nav></x-admin-nav>
    <x-admin-sidebar></x-admin-sidebar>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 sedan-regular">Administrators</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{ route('admin.administrators') }}">Back</a></li>

                            <li class="breadcrumb-item active">admins</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @livewire('admin.edit-administrator',['sentAdmin' => $admin->id])
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-admin-footer></x-admin-footer>
</x-admin-layout>
<script>
    Livewire.on('updatedAdmin',e => {
        toastr.success('Successful! Administrator\'s account was updated.');
    })
</script>