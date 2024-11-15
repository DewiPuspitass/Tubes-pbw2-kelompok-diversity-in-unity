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
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $u => $data)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>
                                                    @if(!empty($data->getRoleNames()))
                                                        @foreach($data->getRoleNames() as $v)
                                                            <label class="badge bg-success">{{ $v }}</label>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="badgesLink">
                                                        </br>
                                                        @can('role-edit')
                                                        <span class="badge badge-warning"><a
                                                            href="{{ route('edit_user', ['id' => $data->id]) }}"><i
                                                                class="fa fa-edit"></i></a></span></br>
                                                        @endcan
                                                    
                                                        @can('role-delete')
                                                        <form method="POST" action="{{ route('hapus_user', $data->id) }}" style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                        
                                                            <span class="badge badge-danger" onclick="if (confirm('Apakah anda yakin ingin menghapus menu ini?')) { this.closest('form').submit(); }">
                                                                <i class="fa fa-trash-o"></i>
                                                            </span>
                                                        </form>                                                    
                                                        @endcan
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