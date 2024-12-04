<x-guest-layout>
    <div class="container" id="container">
        <div class="form-container sign-up">
            {{-- Register --}}
            <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                @csrf
                <h1>Buat Akun</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                </div>
                <span>atau gunakan email anda!</span>
                <x-text-input id="id" type="text" name="id" :value="old('id')" autofocus autocomplete="id" placeholder="id" hidden/>
                <x-input-error :messages="$errors->get('id')" class="mt-2" />
                
                <x-text-input id="name" type="text" class="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama Kedai/Nama"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                <x-text-input id="email" type="email" class="text" name="email" :value="old('email')" required autofocus autocomplete="email" placeholder="email"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <x-text-input id="password" type="password" class="text" name="password" :value="old('password')" required autofocus autocomplete="password" placeholder="password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
        
                <div class="input-group">
                    <div class="column">
                        <label for="">Foto</label>
                    </div>
                    <div class="column">
                        <input type="file" placeholder="foto" name="foto" required>
                    </div>
                </div>
                <button type="submit" class="btn" name="simpan">Sign Up</button>    
            </form>
        </div>
</x-guest-layout>
