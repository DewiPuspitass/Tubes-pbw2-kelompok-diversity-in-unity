<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container" id="container">
        <div class="form-container sign-up">
            {{-- Register --}}
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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

        {{-- Login --}}
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Log In</h1>
                <div class="social-icons">
                    <a href="#" class="icons"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icons"><i class="fa-brands fa-facebook"></i></a>
                </div>
                <span>atau gunakan email dan password!</span>
                <x-text-input id="email" class="text" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <x-text-input id="password" class="text"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                {{-- <a href="">Forget Your Password?</a> --}}
                @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                <button type="submit" class="btn" name="simpan">{{ __('Log in') }}</button>  
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img src="{{ asset('assets/images/logobesarcrop.png') }}" width="290px" height="190px" alt="">
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <img src="{{ asset('assets/images/logobesarcrop.png') }}" width="290px" height="190px" alt="">
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div> 
</x-guest-layout>
