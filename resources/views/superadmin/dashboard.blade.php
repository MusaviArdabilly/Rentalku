@extends('layout.adminlayout')
@section('title', 'Super Admin | Dashboard')
@section('content')

<script type="text/javascript">
  document.getElementById('dashboard').classList.add('active');
</script>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid min-vh-100-180">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Jumlah Pengguna -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Pengguna</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totaluser }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-car fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Agen -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Agen</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalagent }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-server fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Jumlah Iklan -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Iklan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totaladvertisement }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-car fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Transaksi -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Transaksi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totaltransaction }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-server fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->

                    <!--  -->

                </div>
                <!-- /.container-fluid --><!-- /.End of Page Content -->

@endsection