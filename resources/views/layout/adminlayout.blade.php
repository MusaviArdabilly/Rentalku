<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/additional.css') }}" rel="stylesheet">
    
    <!-- Date Time Picker-->
    <link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark6 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Rentalku</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @if(Auth::user()->role == "agent")

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dashboard">
                <a class="nav-link" href="{{ asset('/admin/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="profil">
                <a class="nav-link" href="{{ url('/a/'.auth()->user()->username) }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Profil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kendaraan
            </div>

            <!-- Mobil -->
            <li class="nav-item" id="mobil">
                <a class="nav-link" href="{{ asset('/admin/mobil') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Mobil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Produk
            </div>

            <!-- Mobil -->
            <li class="nav-item" id="produk">
                <a class="nav-link" href="{{ asset('/admin/produk') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Produk</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pemasukan
            </div>

            <li class="nav-item" id="transaksi">
                <a class="nav-link" href="{{ asset('/admin/transaksi') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Transaksi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengeluaran
            </div>

            <li class="nav-item" id="pajak">
                <a class="nav-link" href="{{ asset('/admin/pajak') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Pajak</span></a>
            </li>

            <li class="nav-item" id="perawatan">
                <a class="nav-link" id="perawatan" href="{{ asset('/admin/perawatan') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Perawatan</span></a>
            </li>

            @elseif(Auth::user()->role == "admin")

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dashboard">
                <a class="nav-link" href="{{ asset('/admin/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>            

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dashboard">
                <a class="nav-link" href="{{ asset('/admin/management_user') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>User</span></a>
            </li>            

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dashboard">
                <a class="nav-link" href="{{ asset('/admin/management_corporation') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Perusahaan</span></a>
            </li>            

            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar --> <!--00000000000000000000000000000000000000000000000000000000-->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="profile-picture-tumbnail"
                                src="{{ asset("storageImages/profile/".Auth::user()->picture) }}">
                                {{-- src="{{ url('img/profile/'.Auth::user()->picture) }}"> --}}
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('/a/'.auth()->user()->username) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        
                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('content')

            </div>
            <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>&copy; 2021 <a href="https://www.instagram.com/msvbill/"> Musavi Ardabilly</a></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    <!-- Custom js for hide upload button-->
    <script src="{{ asset('js/hide_upload_button.js') }}"></script>

    <!-- Popper  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Date Time Picker  -->
    <script src="{{ asset('vendor/jquery/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $(function () {
            $('.picker').datetimepicker();
            $('.datepicker').datetimepicker({
                timepicker: false,
                datepicker: true,
                format: 'd-m-Y',
                // value: '22-08-2021'
            })
        });
        // $('.picker').datetimepicker({
        //     timepicker: true,
        //     datepicker: true,
        //     format: 'd-m-Y H:i',
        //     value: '22-08-2021 13-30',
        //     hours12: 'false',
        //     weeks: true
        // })
    </script>

    <!-- Preview Image  -->
    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
            var output = document.getElementById('imgprev');
            output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
</body>

</html>