<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/css/pembeli.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style_pembeli.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/pembelilayout.css') }}">
        {{-- <!-- <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
        <link rel="stylesheet" href="{{asset('assets/css/css_keranjang.css')}}"> -->
        <!-- <link rel="stylesheet" href="{{asset('assets/css/style_keranjang.css')}}">
        <link rel="stylesheet" href="../assets/css/style_tampilan_menu.css"> --> --}}

        <!-- Scripts -->

    </head>
    <body >
        <div class="min-h-screen bg-gray-100">
            @include('Pesan.dasbord')

            <!-- Page Heading -->
            @isset($header)
            <header class="bg-light border-bottom">
                    <div class="p-4 container">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class=”pt-4”>
                {{ $slot }}
                {{ $content }}
            </main>
        </div>
    </body>
    <x-footer></x-footer>
</html>
