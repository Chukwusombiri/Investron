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
                        <h1 class="m-0 sedan-regular">Company plans</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>

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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-white pt-4 pb-2">
                                <h3 class="card-title text-lg">Investment Plans</h3>

                                <div class="card-tools">
                                    <x-link-two href="{{ route('admin.plan.create') }}"
                                        class="px-4 py-2 rounded-xl hover:text-gray-100">create</x-link-two>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <x-admin-alert class="my-2" />
                                <div class="grid grid-cols-4 gap-6">
                                  @if (count($plans)>0)
                                      @foreach ($plans as $plan)
                                      <div class="col-span-4 md:col-span-2 rounded-xl border border-gray-700 px-4 py-4 md:px-6 md:py-4 shadow">
                                          <h2 class="sedan-regular text-lg tracking-wide mb-2">{{$plan->name}}</h2>
                                          <p class="text-sm mb-2">Monthly interest rate: {{$plan->perMonInt}}%</p>
                                          <p class="text-sm mb-2">Minimum investment amount: ${{number_format($plan->min)}}</p>
                                          <p class="text-sm mb-2">Maximum investment amount: ${{number_format($plan->max)}}</p>
                                          <p class="text-sm mb-2">Duration of plan: {{$plan->duration}} months</p>
                                          <p class="futura-light text-sm mb-4">Created on: {{date('M d, y',strtotime($plan->created_at))}}%</p>
                                          <h3 class="sedan-regular text-md mb-2 underline">Features</h3>
                                          <ul class="list-style-none space-y-2" role="list">
                                            @foreach (json_decode($plan->features,true) as $item)
                                                <li class="flex items-center">
                                                  <span class="mr-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check w-5 h-5" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                      <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                  </span>
                                                  {{$item}}
                                                </li>
                                            @endforeach
                                          </ul>
                                          <div class="flex justify-end py-2 items-center">
                                            <x-link-two href="{{ route('admin.plan.edit', [$plan->id]) }}" class="px-4 py-1 mr-4 rounded-xl mt-2 hover:text-gray-100">Edit</x-link-two>
                                            <form method="POST"
                                                  action="{{ route('admin.plan.destroy', [$plan->id]) }}">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="px-4 py-2 text-gray-100 rounded-xl bg-rose-500 mt-2">
                                                      {{ __('DELETE') }}
                                                  </button>
                                              </form>                                            
                                          </div>
                                      </div>
                                      @endforeach
                                  @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
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
