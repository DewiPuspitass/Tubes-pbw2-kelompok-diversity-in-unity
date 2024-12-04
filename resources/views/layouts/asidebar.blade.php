<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('dashboard') }}"><img src="../assets/images/logoadmingelap.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{ route('dashboard') }}"><img src="../assets/images/logokecil.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Beranda </a>
                </li>

                <h3 class="menu-title">Menu</h3>
                <li class="menu-item-has-children dropdown">
                    <a href="{{ route('tampilMenu') }}" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list-ul"></i>Tabel Menu</a>
                    <a href="{{ route('tambahMenu') }}" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-plus"></i>Tambahkan Menu</a>
                </li>
                

                <h3 class="menu-title">Transaksi</h3>

                <li class="menu-item-has-children dropdown">
                    <a href="" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Tabel Transaksi</a>
                    <a href="" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-check-square-o"></i>Tabel Konfirmasi</a>
                </li>

                <h3 class="menu-title">Riwayat</h3>

                <li class="menu-item-has-children dropdown">
                    <a href="riwayat/tabel_transaksi.php" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Tabel Transaksi</a>
                    <a href="riwayat/tabel_konfirmasi.php" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-check-square-o"></i>Tabel Konfirmasi</a>
                </li>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="../images/profile/" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{ route('profile') }}"><i class="fa fa-user"></i> My Profile</a>
                        <a class="nav-link" href="logout.php" onclick = "return confirm ('apakah anda yakin mau logout?');"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header-->