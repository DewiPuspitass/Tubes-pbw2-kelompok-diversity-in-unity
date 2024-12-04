<x-app-layout>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Profile & Pengaturan</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <!-- Table -->
           <div class="animated fadeIn">
               <div class="row">
                   <div class="col-md-12">
                       <div class="card">
                           <div class="card-header">
                               <strong class="card-title">Profil</strong>
                           </div>
                           <div class="card-body">
                               <div class="row">
                                   <div class="col-md-3">
                                    <img class="mx-auto d-block rounded-circle" style="width:85px; height:85px;" alt=""
                                         src="{{ $user->profile_images ? asset('storage/' . $user->profile_images) : asset('assets/images/default_profilee.png') }}">
                                    </div>
                                   <div class="pemberitahuan">
                                       <div class="row pl-3">
                                           <p class="px-2">Informasi Umum</p>
                                       </div>
                                       <div class="col-sm-12">
                                           <!-- Kolom pertama -->
                                           <div class="form-group">
    
                                           <p>Nama Kedai</p>
                                               <label for="nama" class="control-label mb-1 px-2">{{ $user->name }}</label>
                                               </div>
                                               <div class="form-group">
                                                   <p>Email</p>
                                                   <label for="deskripsi" class="control-label mb-1 px-2">{{ $user->email }}</label>
                                               </div>
                                               <div class="form-group">
                                                   <a href="/edit_profile/{{ $user->id }}" class='btn btn-warning btn-sm warna px-4 mb-2'>Edit</a>
                                           </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <strong class="card-title">Pengaturan</strong>
                   </div>
                   <div class="card-body">
                       <label for="nama" class="control-label mb-1 px-2"><a href="help_center.html" style="color:black;"><i class="fa fa-question-circle px-2"></i> Help Center</a></label>
                   </div>
                   <div class="card-header">
                       <label for="nama" class="control-label mb-1 px-1"><a href="app_info.html" style="color:black;"><i class="fa fa-info-circle px-2"></i> App Info</a></label>
                   </div>
               </div>
           </div>
       </div><!-- .animated -->
    </x-app-layout>