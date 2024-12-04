<x-app-layout>
    <!-- content -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tabel Menu</h1>
                </div>
            </div>
        </div>


        <div class="content mt-4">
            <!-- Table -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Menu</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menus as $item)
                                            <tr>
                                                <td><img src="{{ asset('storage/' . $item->gambar_menu) }}" width="120px" height="100px" alt=""></td>
                                                <td>{{ $item->nama_menu }}</td>
                                                <td>{{ $item->deskripsi_menu }}</td>
                                                <td>Rp. {{ $item->harga_menu }}</td>
                                                <td>
                                                    <div class="badgesLink">
                                                        </br>
                                                        <span class="badge badge-warning"><a
                                                                href="{{ route('editMenu', ['id' => $item->id_menu]) }}"><i
                                                                    class="fa fa-edit"></i></a></span></br>
                                                        <span class="badge badge-danger"><a
                                                                href="../proses/hapus_menu.php"
                                                                onclick = "return confirm ('apakah anda yakin ingin menghapus menu ini?');"><i
                                                                    class="fa fa-trash-o"></i></a></span>
                                                    </div>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
