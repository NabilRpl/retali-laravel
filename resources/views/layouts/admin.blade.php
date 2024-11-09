<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page_title ?? 'Aplikasi Travel' }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/vendor/adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/adminlte') }}/dist/css/adminlte.min.css?v=3.2.0">

    <style>
        /* Custom styles for purple and white theme */
        body {
            background-color: white;
            /* White background */
            color: #343a40;
            /* Default text color */
        }

        .navbar {
            background-color: #FFFFFFFF;
            /* Purple background for navbar */
        }

        .navbar .nav-link {
            color: white;
            /* White text color for navbar links */
        }

        .navbar .nav-link.active {
            background-color: #6f42c1;
            /* Darker purple for active links */
        }

        .main-sidebar {
            background-color: #6f42c1;
            /* Purple background for sidebar */
            padding-bottom: 10px;
            /* Add bottom padding to prevent overlap with underline */
        }

        .main-sidebar .brand-link {
            border-bottom: 2px solid white;
            /* White underline below brand logo */
            padding-bottom: 15px;
            /* Space below the logo */
        }

        .main-sidebar .nav-link {
            color: white;
            /* White text color for sidebar links */
        }

        .main-sidebar .nav-link.active {
            background-color: #5a31a2;
            /* Darker purple for active sidebar links */
        }

        .content-wrapper {
            background-color: #f4f6f9;
            /* Light grey for content wrapper */
        }

        .table thead th {
            background-color: #6f42c1;
            /* Purple background for table header */
            color: white;
            /* White text color for table header */
        }

        .btn-primary {
            background-color: #6f42c1;
            /* Purple button background */
            border-color: #6f42c1;
            /* Purple button border */
        }

        .btn-primary:hover {
            background-color: #5a31a2;
            /* Darker purple on hover */
            border-color: #5a31a2;
            /* Darker border on hover */
        }

        .alert-success {
            background-color: #d4edda;
            /* Light green background for success messages */
            color: #155724;
            /* Dark green text for success messages */
        }

        .table-laporan th {
            background-color: #6f42c1;
            color: white;
        }
    </style>

    @yield('css')
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ asset('assets/vendor/adminlte') }}/index3.html" class="brand-link">
                <img src="{{ asset('assets/vendor/adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-2" style="opacity: .8">
                <span class="brand-text font-weight-light">Retali Mustajab Travel</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- User Panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('assets/vendor/adminlte') }}/dist/img/user2-160x160.jpg"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Dashboard link -->
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <!-- Agenda link -->
                        <li class="nav-item">
                            <a href="{{ route('admin.agenda.index') }}"
                                class="nav-link {{ request()->is('admin/agenda/index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>Agenda</p>
                            </a>
                        </li>
                        <!-- Laporan link -->
                        <li class="nav-item">
                            <a href="{{ route('admin.laporan.index') }}"
                                class="nav-link {{ request()->is('admin/laporan') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                        <!-- Ceklis link -->
                        <li class="nav-item">
                            <a href="{{ route('admin.reports.index') }}"
                                class="nav-link {{ request()->is('admin/reports') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Tugas Ceklis</p>
                            </a>
                        </li>
                        <!-- Logout -->
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="nav-link bg-danger">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p>Logout</p>
                                </a>
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{ $page_title ?? 'Dashboard' }}</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                <!-- Optional content for footer -->
            </div>
            <strong>&copy; 2024 <a href="#">Retali Mustajab Travel</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    <!-- ./wrapper -->

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/adminlte') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/vendor/adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/vendor/adminlte') }}/dist/js/adminlte.min.js?v=3.2.0"></script>
    <script>
        // Rupiah format function
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>

    @yield('js')
</body>

</html>
