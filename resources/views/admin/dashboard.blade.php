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
                        <h1 class="m-0 sedan-regular">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6 col-12">
                        <!-- small box -->
                        <div class="small-box bg-gray-700">
                            <div class="inner">
                                <h3 class="text-gray-100">{{ $users }}</h3>

                                <p class="text-gray-100">USERS</p>
                            </div>
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-dollar"
                                    width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h3" />
                                    <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                    <path d="M19 21v1m0 -8v1" />
                                </svg>
                            </div>
                            <a href="{{ route('admin.users') }}" class="small-box-footer">View All <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 col-12">
                        <!-- small box -->
                        <div class="small-box bg-gray-700">
                            <div class="inner">
                                <h3 class="text-gray-100">${{ number_format($acRoi) }}</h3>

                                <p class="text-gray-100">TOTAL ROI</p>
                            </div>
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-chart-arrows-vertical" width="40"
                                    height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M18 21v-14" />
                                    <path d="M9 15l3 -3l3 3" />
                                    <path d="M15 10l3 -3l3 3" />
                                    <path d="M3 21l18 0" />
                                    <path d="M12 21l0 -9" />
                                    <path d="M3 6l3 -3l3 3" />
                                    <path d="M6 21v-18" />
                                </svg>
                            </div>
                            <a href="{{ route('admin.deposits') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 col-12">
                        <!-- small box -->
                        <div class="small-box bg-gray-700">
                            <div class="inner">
                                <h3 class="text-gray-100">${{ number_format($perMonRoi) }}</h3>

                                <p class="text-gray-100">MONTHLY PERFORMANCE</p>
                            </div>
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-device-desktop-analytics" width="40"
                                    height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M3 4m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" />
                                    <path d="M7 20h10" />
                                    <path d="M9 16v4" />
                                    <path d="M15 16v4" />
                                    <path d="M9 12v-4" />
                                    <path d="M12 12v-1" />
                                    <path d="M15 12v-2" />
                                    <path d="M12 12v-1" />
                                </svg>
                            </div>
                            <a href="{{ route('admin.deposits') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 col-12">
                        <!-- small box -->
                        <div class="small-box bg-gray-700">
                            <div class="inner">
                                <h3 class="text-gray-100">${{ number_format($acBal) }}</h3>

                                <p class="text-gray-100">ACTIVE FUNDS</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.users') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6 col-12">
                        <!-- small box -->
                        <div class="small-box bg-gray-700">
                            <div class="inner">
                                <h3 class="text-gray-100">${{ !empty($depositedValue) ? $depositedValue : '0.00' }}</h3>

                                <p class="text-gray-100">APPROVED DEPOSITS:
                                    {{ !empty($depositedCount) ? $depositedCount : '0' }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('admin.deposits') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6 col-12">
                        <!-- small box -->
                        <div class="small-box bg-gray-700">
                            <div class="inner">
                                <h3 class="text-gray-100">
                                    ${{ !empty($withdrawnValue) ? number_format($withdrawnValue) : '0.00' }}</h3>

                                <p class="text-gray-100">APPROVED WITHDRAWALS:
                                    {{ !empty($withdrawnCount) ? $withdrawnCount : '0' }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-upload"></i>
                            </div>
                            <a href="{{ route('admin.withdrawals') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-12">
                        <div class="row">
                            <!-- USERS LIST -->
                            @if (count($newusers) > 0)
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Latest users</h3>

                                            <div class="card-tools">
                                                <span class="badge badge-danger">{{ count($newusers) }} New
                                                    Members</span>
                                                <button type="button" class="btn btn-tool"
                                                    data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool"
                                                    data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <ul
                                                class="flex flex-wrap justify-between p-4 divide-y divide-x divide-gray-300">
                                                @foreach ($newusers as $newuser)
                                                    <li class="flex flex-col p-2">
                                                        @if ($newuser->profile_photo_path)
                                                            <img src="{{ asset('storage/' . $newuser->profile_photo_path) }}"
                                                                alt="User Image" class="w-8 h-8 rounded-full">
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" fill="currentColor"
                                                                class="size-8">
                                                                <path fill-rule="evenodd"
                                                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        @endif

                                                        <a class=""
                                                            href="{{ route('admin.user.show', [$newuser->id]) }}">{{ $newuser->username ?? $newuser->email }}</a>
                                                        <span
                                                            class="text-xs text-neutral-600">{{ $newuser->created_at->diffForHumans() }}</span>
                                                    </li>
                                                @endforeach
                                                <!-- /.users-list -->
                                            </ul>
                                            <!-- /.card-body -->
                                            <div class="card-footer text-center">
                                                <a href="/admin/users">View All Users</a>
                                            </div>
                                            <!-- /.card-footer -->
                                        </div>
                                        <!--/.card -->
                                    </div>
                                </div>
                            @endif
                            <!-- WITHDRAWAL LIST -->
                            @if (count($newWithdrawals) > 0)
                                <div class="card col-md-6">
                                    <div class="card-header">
                                        <h3 class="card-title">Recently Added Withdrawals</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <ul class="products-list product-list-in-card pl-2 pr-2 divide-y">
                                            @foreach ($newWithdrawals as $newwithdrawal)
                                                <li class="item">
                                                    <div class="product-img">
                                                        @if ($newwithdrawal->user->profile_photo_path)
                                                            <img src="{{ asset('storage/' . $newwithdrawal->user->profile_photo_path) }}"
                                                                alt="User Image" class="w-8 h-8 rounded-full">
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" fill="currentColor"
                                                                class="size-8">
                                                                <path fill-rule="evenodd"
                                                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        @endif
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{ route('admin.user.show', [$newwithdrawal->user_id]) }}"
                                                            class="product-title">{{ $newwithdrawal->user->username ?? $newwithdrawal->user->email }}
                                                            <span
                                                                class="badge badge-warning float-right">${{ $newwithdrawal->amount }}</span></a>
                                                        <span class="product-description">
                                                            {{ $newwithdrawal->wallet }}
                                                        </span>
                                                    </div>
                                                </li>
                                                <!-- /.item -->
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                        <a href="{{ route('admin.withdrawals') }}" class="uppercase">View All
                                            Withdrawals</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                            @endif
                            {{-- col --}}
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-12">
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="row">
                            @if (count($newDeposits) > 0)
                                <div class="card col-md-8">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Latest Deposits</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Amount</th>
                                                        <th>Wallet</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($newDeposits as $newinvestment)
                                                        @if ($newinvestment->user)
                                                            <tr>
                                                                <td><a
                                                                        href="{{ route('admin.user.show', [$newinvestment->user->id]) }}">{{ $newinvestment->user->username ?? $newinvestment->user->email }}</a>
                                                                </td>
                                                                <td>${{ $newinvestment->amount }}</td>
                                                                <td>
                                                                    @if ($newinvestment->isApproved)
                                                                        <span
                                                                            class="badge badge-success">approved</span>
                                                                    @else
                                                                        <span
                                                                            class="badge badge-warning">pending</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="sparkbar" data-color="#00a65a"
                                                                        data-height="20">
                                                                        {{ $newinvestment->wallet }}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <a href="{{ route('admin.deposits') }}"
                                            class="btn btn-sm btn-secondary float-right">View All Investments</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            @endif
                            <div class="col-md-4">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box mb-3 bg-gray-700 text-gray-100">
                                    <span class="info-box-icon"><i class="far fa-heart"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text text-gray-100">Total Investments</span>
                                        <span class="info-box-number text-gray-100">{{ $totDepositCount }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                <div class="info-box mb-3 bg-gray-700 text-gray-100">
                                    <span class="info-box-icon"><i class="far fa-heart"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text text-gray-100">Total Withdrawals</span>
                                        <span class="info-box-number text-gray-100">{{ $totWitCount }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <x-admin-footer></x-admin-footer>
</x-admin-layout>
