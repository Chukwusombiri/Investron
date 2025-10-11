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
                        <h1 class="m-0 sedan-regular">Investment plan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{ route('admin.plans') }}">Back</a></li>

                            <li class="breadcrumb-item active">plan</li>
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
                                <h3 class="card-title">Update Plan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body"> 
                                @livewire('admin.edit-plan',['sentPlan'=>$plan->id])
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
  Livewire.on('updatedPlan',e => {
    toastr.success('Investment plan was updated successfully');
  });
  Livewire.on('updatePlanFailed',e => {
    toastr.error('Unable to update investment plan');
  });
</script>