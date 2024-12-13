<x-app-layout>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tabel Menu</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-4">
        <a href="{{ route('vouchers.create') }}" class="btn btn-primary mb-3">Tambah Kupon</a>
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
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1; 
                                    @endphp
                                    @foreach ($vouchers as $voucher)
                                        <tr>
                                            <td>{{ $voucher->id }}</td>
                                            <td>{{ $voucher->nama }}</td>
                                            <td>{{ $voucher->harga }}</td>
                                            <td>
                                                @if($voucher->status === 'available')
                                                    <span class="badge bg-success">Available</span>
                                                @else
                                                    <span class="badge bg-danger">Unavailable</span> 
                                                @endif
                                            </td>
                                        
                                            <td>
                                                <div class="badgesLink">
                                                </br>
                                                @can('role-edit')
                                                    <span class="badge badge-warning">
                                                        <a href="{{ route('vouchers.edit', $voucher->id) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </span></br>
                                                @endcan

                                                @can('role-delete')
                                                    <form method="POST" action="{{ route('vouchers.destroy', $voucher->id) }}" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <span class="badge badge-danger" onclick="if (confirm('Apakah anda yakin ingin menghapus kupon ini?')) { this.closest('form').submit(); }">
                                                        <i class="fa fa-trash-o"></i>
                                                    </span>
                                                    </form>
                                                @endcan
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
    </div>
</x-app-layout>
