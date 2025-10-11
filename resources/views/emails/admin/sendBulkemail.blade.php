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
            <h1 class="m-0">Bulk Mail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">dashboard</a></li>
              
              <li class="breadcrumb-item active">mail</li>
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
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Send Mail to all Investors</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mx-3">@include('inc.messages')</div>
            <!-- form start -->
            <p class="mb-3">Note: This mail will be sent to every email in our records.</p>
            <form id="bulkemailForm" method="POST" action="{{route('admin.bulkemail')}}">
                @csrf
                <div class="form-row">
                    <div id="bulkemailFormResponse" class="col-md-12"></div>
                    <div class="form-group col-md-12">                      
                        <label for="mail_subject">Subject</label>
                        <input type="text" name="mail_subject" class="form-control" id="mail_subject" required>  
                        @error('mail_subject')
                          <div class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</div>
                        @enderror                    
                    </div>

                    <div class="form-group col-md-12">
                        <label for="mail_body">Message</label>
                        <textarea name="mail_body" id="mail_body" class="form-control" cols="30" rows="6" required></textarea>
                        @error('mail_body')
                        <div class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                  <button type="submit" class="btn btn-primary">Send Mail</button>
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