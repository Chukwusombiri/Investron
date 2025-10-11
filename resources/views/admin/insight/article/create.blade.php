<x-admin-layout>
    <x-admin-nav></x-admin-nav>
    <x-admin-sidebar></x-admin-sidebar>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 sedan-regular">Insights</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  
                  <li class="breadcrumb-item"><a href="/admin/articles">articles</a></li>
                  
                  <li class="breadcrumb-item active">new</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @livewire('admin.article.create-article')
                <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
          </div>
        </section>
    </div>
</x-admin-layout>