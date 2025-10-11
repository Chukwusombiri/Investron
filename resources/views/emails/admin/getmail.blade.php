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
            <h1 class="m-0">Mail System</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              
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
            <div class="card-header d-flex">
              <h3 class="card-title">Send Email</h3>

              <div class="card-tool ml-auto">
                <a href="{{route('admin.sendBulkemail')}}" id="bulkemail" class="btn btn-secondary">Bulk Email? </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mx-3">@include('inc.messages')</div>
            <!-- form start -->
            <form method="POST" action="{{route('admin.sendmail')}}">
                @csrf
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="sjt">Subject</label>
                    <input type="text" class="form-control @error('sjt') is-invalid @enderror" id="sjt" name="sjt" value="{{old('sjt')}}" required>

                        @error('sjt')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group col-12">
                    <label for="msg">Email Message</label>
                    <textarea type="text" rows="4" class="form-control @error('msg') is-invalid @enderror" id="msg" name="msg" value="{{old('msg')}}" required></textarea>

                        @error('msg')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                   
                  <div class="form-group col-12">
                    <label for="email">Recipient</label>
                    <select id="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                        @if (isset($single->email))
                            <option value="{{$single->email}}" selected>{{$single->name}}</option>
                        @else
                            @if (isset($users) && count($users)>0)
                                <option selected>Select Recipient</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->email}}" @if(old('email')==$user->email){{'selected'}}@endif>{{$user->name}}</option>
                                @endforeach
                            @else
                                <option disabled>Go to  user management and create a user</option>
                            @endif
                        @endif                                                          
                    </select>
                        @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                                 
                <button type="submit" class="btn btn-primary">Send</button>
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