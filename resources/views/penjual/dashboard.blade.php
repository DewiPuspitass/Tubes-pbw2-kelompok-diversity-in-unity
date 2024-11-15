<x-app-layout>
    <!-- content -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Beranda</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span> Hallo! Selamat Datang
                {{ Auth::user()->name }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @hasrole('User')
        <div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Silahkan hubungi admin untuk meminta role!</h1>
                        <h1>087822915732</h1>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        
        @hasanyrole('Admin|Penjual|Kasir')
        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-link text-danger border-danger"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Konfirmasi</div>
                            <div class="stat-digit">{{ $keranjang->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Transaksi</div>
                            <div class="stat-digit">{{ $transaksi }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Menu</div>
                            <div class="stat-digit">{{ $menu }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="content mt-4">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Konfirmasi</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Meja</th>
                                            <th>Bukti</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjang as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->no_meja }}</td>
                                                <td><a class="link-pembayaran"
                                                        href="{{ $item->pembayaran->bukti_pembayaran_url }}">Lihat Bukti
                                                        Pembayaran</a></td>
                                                <td>
                                                    <div class="badgesLink">
                                                        <form action="proses/update_konfirmasi.php" method="post">
                                                            <input type="hidden" name="id_pembayaran"
                                                                value="{{ $item->pembayaran->id }}">
                                                            <button type="submit" class="badge badge-success px-3"
                                                                name="diterima">Terima</button>
                                                        </form>
                                                        <form action="proses/update_konfirmasi.php" method="post">
                                                            <input type="hidden" name="id_pembayaran"
                                                                value="{{ $item->pembayaran->id }}">
                                                            <button type="submit" class="badge badge-danger px-3"
                                                                name="ditolak">Tolak</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
        @endhasanyrole
    </div><!-- .content -->
    </div>
</x-app-layout>
