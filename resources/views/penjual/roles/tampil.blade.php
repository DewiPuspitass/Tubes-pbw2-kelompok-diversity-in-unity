<x-app-layout>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tabel Roles</h1>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('create_roles') }}" class="btn btn-success mt-3 ml-3">Tambahkan Roles</a>
    <div class="content mt-4">
        <!-- Table -->
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Roles</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <div class="badgesLink">
                                                </br>
                                                    @can('role-edit')
                                                    <span class="badge badge-warning"><a
                                                        href="{{ route('edit_roles', ['id' => $role->id]) }}"><i
                                                            class="fa fa-edit"></i></a></span></br>
                                                    @endcan
                                                
                                                    @can('role-delete')
                                                    <form method="POST" action="{{ route('hapus_roles', $role->id) }}" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                    
                                                        <span class="badge badge-danger" onclick="if (confirm('Apakah anda yakin ingin menghapus menu ini?')) { this.closest('form').submit(); }">
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