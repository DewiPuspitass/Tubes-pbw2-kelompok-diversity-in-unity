<x-app-layout>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Profil</h1>
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
                           <div class="card-body">
                                   <form action="/update_profile/{{ $user->id }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                       <input id="id" name="id" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $user->id }}" hidden>
                                       <div class="col-md-4">
                                           </br></br>
                                           <img class="rounded-circle mx-auto d-block" style="width:85px; height:85px;" alt="" src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/images/default_profilee.png') }}">
                                           <div class="row form-group">
                                               <div class="col-12 mx-5 mt-3">
                                                   <input type="file" id="file-input" name="foto" class="form-control-file" value="{{ $user->foto }}">
                                               </div>
                                           </div>
                                       </div>
                                       <div class="pemberitahuan">
                                           <div class="row pl-3">
                                               <p class="px-2">Informasi Umum</p>
                                           </div>
                                           <div class="col-sm-6">
                                           <input id="id" name="id" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $user->id }}" hidden>
                                               <!-- Kolom pertama -->
                                               <div class="form-group">
                                                   <p>Nama Kedai</p>
                                                   <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $user->name }}">
                                               </div>
                                           </div>
                                           <div class="col-sm-6">
                                               <!-- Kolom kedua (baru) -->
                                               <div class="form-group">
                                                   <p>Email</p>
                                                   <input id="email" name="email" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $user->email }}">
                                               </div>
                                           </div>
                                       </div>
                                           <hr width="80%">
                                       </div>
                                       </div>
                                       <div class="col-md-4">
                                       </div>
                                       <div class="pemberitahuan">
                                           <div class="row pl-3">
                                               <p class="px-4">Ubah Kata Sandi</p>
                                           </div>
                                           <div class="col-sm-6 px-4">
                                                   <!-- Kolom pertama -->
                                                   <div class="form-group">
                                                       <p>Kata Sandi Sekarang</p>
                                                       <input id="password" name="password_old" type="password" class="form-control" aria-required="true" aria-invalid="false" placeholder = "Masukan kata sandi sekarang">
                                                   </div>
                                               </div>
                                               <div class="col-sm-6 px-4">
                                                   <!-- Kolom kedua (baru) -->
                                                   <div class="form-group">
                                                       <p>Kata Sandi Baru</p>
                                                       <input id="password" name="update_password_new" type="password" class="form-control" aria-required="true" aria-invalid="false" placeholder = "Masuk kata sandi baru">
                                                   </div>
                                               </div>
                                           </div>
                                           <hr width="80%">
                                           <div class="pemberitahuan">
                                           <div class="row pl-3">
                                               <p class="px-4">Ubah Pembayaran</p>
                                           </div>
                                           <div class="col-sm-6 px-4">
                                                   <!-- Kolom pertama -->
                                                   <div class="form-group">
                                                       <p>ID Merchant</p>
                                                       <input id="merchant_id" name="merchant_id" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $user->merchant_id }}">
                                                   </div>
                                               </div>
                                               <div class="col-sm-6 px-4">
                                                   <!-- Kolom kedua (baru) -->
                                                   <div class="form-group">
                                                       <p>Bank Account</p>
                                                       <input id="bank_account" name="bank_account" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $user->bank_account }}">
                                                   </div>
                                               </div>
                                           </div>
                                           <hr width="80%">
                                   </div>
                                   <div class="col-lg-6">
                                       <button type="submit" class="btn btn-warning btn-sm warna px-4 mb-4 ml-4" name="edit">Edit</button>
                                       <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm mb-4">Kembali</a>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div><!-- .animated -->
</x-app-layout>