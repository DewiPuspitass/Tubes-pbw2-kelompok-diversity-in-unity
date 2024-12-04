<x-app-layout>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit User</h1>
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
                                        <h3 class="text-center">Edit User</h3>
                                    </div>
                                    <hr>
                                    <form action="/update_user/{{ $user->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Nama</label>
                                            <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="email" class="control-label mb-1">Email</label>
                                            <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="roles" class="control-label mb-1">Roles</label>
                                            <select name="roles[]" class="form-control" multiple>
                                                @foreach ($roles as $id => $name)
                                                    <option value="{{ $name }}" {{ in_array($name, $userRole) ? 'selected' : '' }}>
                                                        {{ $name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    
                                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Kembali</a>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div> <!-- .card -->
            </div>
        </div>
    </div>
</x-app-layout>