<x-app-layout>
    
    <!-- content -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tambahkan Menu</h1>
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
                                        <h3 class="text-center">Tambahkan Menu</h3>
                                    </div>
                                    <hr>
                                    <form id="menuForm" action="{{ route('simpanMenu') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <!-- Kolom pertama -->
                                                <div class="form-group">
                                                    <input id="id" name="id" type="text" class="form-control" hidden>
                                                    <label for="nama_menu" class="control-label mb-1">Nama</label>
                                                    <input id="nama_menu" name="nama_menu" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <label for="deskripsi_menu" class="control-label mb-1">Deskripsi</label>
                                                <div class="row form-group">
                                                    <div class="col-12 col-md-12"><textarea name="deskripsi_menu" id="deskripsi_menu" rows="9" class="form-control" required></textarea></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <!-- Kolom kedua (baru) -->
                                                <div class="form-group">
                                                    <label for="harga_menu" class="control-label mb-1">Harga</label>
                                                    <input id="harga_menu" name="harga_menu" type="text" class="form-control" aria-required="true" aria-invalid="false" required oninput="validateNumberInput(event)">
                                                </div>
                                                <label for="id_kategori" class="control-label mb-1">Kategori</label>
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
                                                <label for="gambar_menu" class="control-label mb-1">Input Gambar</label>
                                                <div class="row form-group">
                                                    <div class="col-12 col-md-9"><input type="file" id="gambar_menu" name="gambar_menu" class="form-control-file" required></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-success btn-sm" name="simpan">Tambahkan</button> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .card -->
                </div>
                <!--/.col-->
            </div>
        </div>
    </div>
</x-app-layout>
