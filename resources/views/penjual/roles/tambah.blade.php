<x-app-layout>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tambah Roles</h1>
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
                                        <h3 class="text-center">Tambahkan Roles</h3>
                                    </div>
                                    <hr>
                                    <form id="menuForm" action="{{ route('simpan_roles') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <!-- Kolom pertama -->
                                                <div class="form-group">
                                                    <input id="id" name="id" type="text" class="form-control" hidden>
                                                    <label for="name" class="control-label mb-1">Nama</label>
                                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <label for="permission" class="control-label mb-1">Permission</label> <br>
                                                {{-- <div class="row form-group">  --}}
                                                    @foreach($permission as $value)
                                                        <label><input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}" class="name">
                                                        {{ $value->name }}</label>
                                                        <br>
                                                    @endforeach
                                                {{-- </div> --}}
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