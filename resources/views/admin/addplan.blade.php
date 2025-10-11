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
                        <h1 class="m-0 sedan-regular">Investment Plans</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{ route('admin.plans') }}">Back</a></li>

                            <li class="breadcrumb-item active">plans</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Create Plan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               @livewire('admin.create-plan')
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
<script>
  Livewire.on('createdPlan',e => {
    toastr.success('Investment plan was created successfully');
  });
  Livewire.on('createPlanFailed',e => {
    toastr.error('Unable to create investment plan');
  });
</script>
