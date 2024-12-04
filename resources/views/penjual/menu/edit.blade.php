<x-app-layout>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Menu</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Edit Menu</h3>
                                    </div>
                                    <hr>
                                    <form action="/update_menu/{{ $menu->id_menu }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <!-- Kolom pertama -->
                                                    <input id="id" name="id" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" hidden>
                                                    <div class="form-group">
                                                        <label for="nama" class="control-label mb-1">Nama</label>
                                                        <input id="nama_menu" name="nama_menu" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $menu->nama_menu }}">
                                                    </div>
                                                    <label for="deskripsi_menu" class="control-label mb-1">Deskripsi</label>
                                                    <div class="row form-group">
                                                        <div class="col-12 col-md-12"><textarea name="deskripsi_menu" id="deskripsi_menu" rows="9" class="form-control">{{ $menu->deskripsi_menu }}</textarea>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <!-- Kolom kedua (baru) -->
                                                    <div class="form-group">
                                                        <label for="additional-column" class="control-label mb-1">Harga</label>
                                                        <input id="additional-column" name="harga_menu" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $menu->harga_menu }}">
                                                    </div>
                                                    <label for="additional-column" class="control-label mb-1">Kategori</label>
                                                    <div class="row form-group">
                                                        <div class="col-12 col-md-12">
                                                            <select name="id_kategori" id="id_kategori" class="form-control">
                                                                @foreach ($kategori as $k)
                                                                    <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    </br>
                                                    <label for="additional-column" class="control-label mb-1">Input Gambar</label>
                                                    <div class="row form-group">
                                                        <div class="col-12 col-md-9"><input type="file" id="gambar_menu" name="gambar_menu" class="form-control-file" value=""></div>
                                                    </div>
                                                    <img class="ml-3 mt-3 d-block" src="{{ asset('storage/' . $menu->gambar_menu) }}" width="120px" height="100px" alt="Card image cap">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-warning btn-sm warna px-4" name="simpan">Edit</button>
                                            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .card -->
            </div>
        </div>
    </div>
</x-app-layout>