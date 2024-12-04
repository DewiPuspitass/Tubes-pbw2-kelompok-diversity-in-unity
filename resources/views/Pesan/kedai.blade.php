<x-apppembeli>
    <x-slot:content>
        <body>
            <nav>
                <div class="navbar">
                    <a href="" class="navbar-logo"><img src="../assets/images/logobesarmerahcrop.png" alt=""></a>
                    <div class="navbar-nav" id="navbar-nav">
                        <a href="{{ route('Pesan.index') }}">Beranda</a>
                        <a href="{{route('Pesan.kedai')}}">Kedai</a>
                        <a href="/pesan#about_us">Tentang Kami</a>
                    </div>

                    <div class="navbar-extra">
                        <a href="{{ route('keranjang.Pesan')}}" id="shopping-cart"><img src="../assets/images/shoppingcart.png" alt="" width="30px" height="30px"><span>4</span></a>
                        <a href="#" id="hamburger-menu"><img src="../assets/images/menu.png" alt="" width="30px" height="30px"></a>
                    </div>
                </div>
            </nav>

            <div class="contentKedai">
                     <!-- hero start -->
            <section class="hero" id="home">
                <main class="content">
                    <h1>Pilih Kedai dan</h1>
                    <h1>Pesan Menu</h1>
                    <h1>Andalanmu!</h1>
                </main>
            </section>
            <!-- hero end -->

            <!-- search section start -->
            <section id="search" class="search">
                <h1>Temukan Kedai</h1>
                <input type="text" name="search" placeholder="Cari Kedai..">
            </section>
            <!-- search section end -->

            <!-- Menu section start -->
            <section id="kedai" class="kedai">
                <div class="row">
                    @foreach($penjuals as $penjual)
                    <a href="{{ route('Pesan.menu', ['id' => $penjual->id]) }}">
                            <div class="kedai-card">
                                <div class="kedai-card-gambar">
                                    <img src="{{ asset('images/profile/' . $penjual->foto) }}" alt="{{ $penjual->nama_kedai }}" width="100%" height="100%" class="kedai-card-img" />
                                </div>
                                <div class="kanan">
                                    <h3 class="kedai-card-title">{{ $penjual->name }}</h3>
                                    <div class="menuu">
                                        @foreach($penjual->menus as $menu)
                                            <img src="{{ asset('images/menu/' . $menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}" width="100%" height="100%">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination start -->
                <!-- <div class="pagination-container">
                    {{ $penjuals->links() }}
                </div> -->
                <!-- pagination end -->
            </section>
            <!-- Menu section end -->
            </div>


            <script>
                const navbarNav = document.querySelector(".navbar-nav");
                document.querySelector("#hamburger-menu").onclick = () => {
                    navbarNav.classList.toggle("active");
                };
                const hamburger = document.querySelector("#hamburger-menu");
                document.addEventListener("click", function (e) {
                    if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
                        navbarNav.classList.remove("active");
                    }
                });
            </script>
        </body>
    </x-slot:content>
</x-apppembeli>
