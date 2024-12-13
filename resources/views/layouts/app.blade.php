<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tel-Aneca') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jqvmap/dist/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/css_tambahan.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/init-scripts/data-table/datatables-init.js') }}"></script>


    <script src="{{ asset('assets/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.js') }}"></script>
    <script src="{{ asset('assets/vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
</head>

<body class="font-sans antialiased">
    {{-- <div class="min-h-screen bg-gray-100"> --}}
        <!-- Left Panel -->
        <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">

                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                        aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ route('dashboard') }}"><img
                            src="../assets/images/logoadmingelap.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="{{ route('dashboard') }}"><img
                            src="../assets/images/logokecil.png" alt="Logo"></a>
                </div>

                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        @can('dashboard')
                        <li class="active">
                            <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Beranda </a>
                        </li>
                        @endcan

                        @canany(['menu-list', 'menu-list', 'menu-create', 'menu-edit', 'menu-delete'])
                        <h3 class="menu-title">Menu</h3>
                        <li class="menu-item-has-children dropdown">
                            <a href="{{ route('tampilMenu') }}" class="dropdown-toggle" aria-haspopup="true"
                                aria-expanded="false"> <i class="menu-icon fa fa-list-ul"></i>Tabel Menu</a>
                            <a href="{{ route('tambahMenu') }}" class="dropdown-toggle" aria-haspopup="true"
                                aria-expanded="false"> <i class="menu-icon fa fa-plus"></i>Tambahkan Menu</a>
                        </li>
                        @endcanany

                        @canany(['transaksi-list', 'transaksi-list', 'transaksi-create', 'transaksi-edit', 'transaksi-delete'])
                        <h3 class="menu-title">Transaksi</h3>

                        <li class="menu-item-has-children dropdown">
                            <a href="" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i
                                    class="menu-icon fa fa-money"></i>Tabel Transaksi</a>
                            <a href="" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i
                                    class="menu-icon fa fa-check-square-o"></i>Tabel Konfirmasi</a>
                        </li>

                        <h3 class="menu-title">Riwayat</h3>

                        <li class="menu-item-has-children dropdown">
                            <a href="riwayat/tabel_transaksi.php" class="dropdown-toggle" aria-haspopup="true"
                                aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Tabel Transaksi</a>
                            <a href="riwayat/tabel_konfirmasi.php" class="dropdown-toggle" aria-haspopup="true"
                                aria-expanded="false"> <i class="menu-icon fa fa-check-square-o"></i>Tabel
                                Konfirmasi</a>
                        </li>
                        @endcanany
                        @canany(['role-list', 'role-list', 'role-create', 'role-edit', 'role-delete'])
                        <h3 class="menu-title">Admin</h3>

                        <li class="menu-item-has-children dropdown">
                            <a href="{{ route('manage_user') }}" class="dropdown-toggle" aria-haspopup="true"
                                aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Manage Pengguna</a>
                            <a href="{{ route('manage_role') }}" class="dropdown-toggle" aria-haspopup="true"
                                aria-expanded="false"> <i class="menu-icon fa fa-tags"></i>Manage Role</a>
                        </li>
                        @endcanany
                        
                        @canany(['kupon-list', 'kupon-list', 'kupon-create', 'kupon-edit', 'kupon-delete'])
                        <h3 class="menu-title">Kupon</h3>

                        <li class="menu-item-has-children dropdown">
                            <a href="{{ route('manage_kupon') }}" class="dropdown-toggle" aria-haspopup="true"
                                aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Manage Kupon</a>
                        </li>
                        @endcanany
                    </ul>
                </div>
            </nav>
        </aside>
        <!-- Left Panel -->

        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <!-- Header-->
            <header id="header" class="header">
                <div class="header-menu">
                    <div class="col-sm-7">
                        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    </div>
                    <div class="col-sm-5">
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="{{ Auth::user()->profile_images ? asset('storage/' . Auth::user()->profile_images) : asset('assets/images/default_profilee.png') }}" alt="User Avatar">
                            </a>

                            <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="{{ 'settings' }}"><i class="fa fa-user"></i> My
                                    Profile</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="nav-link btn btn-link" onclick="return confirm('Apakah anda yakin mau logout?');">
                                            <i class="fa fa-power-off"></i> Logout
                                        </button>
                                    </form>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header-->
            {{--             
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    {{-- </div> --}}
</body>

</html>
