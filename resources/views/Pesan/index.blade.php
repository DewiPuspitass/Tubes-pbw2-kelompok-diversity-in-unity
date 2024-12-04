<x-apppembeli>
    <x-slot:content>
    <main>
        <!-- Main section for the Penjual and its menus -->
        <section class="row1">
            <div class="row1-text">
                <h1>Pesan dan Pantau <br/>dengan Mudah!</h1>
                <p>Memesan menu kantin dan memantau <br/>status pesanan hanya dengan satu <br/>platform</p>
                <div class="row1-button">
                    <a href="{{route('Pesan.index')}}" class="button buttonKedai">
                        <p>Lihat Kedai</p>
                        <img src="{{ asset('assets/images/Forward.png') }}">
                    </a>
                    <a href="{{ url('pembeli/status_pemesanan') }}" class="button buttonStatus">
                        <p>Lihat Status</p>
                        <img src="{{ asset('assets/images/Forward.png') }}">
                    </a>
                </div>
            </div>
            <div class="row1-pict">
                <img src="{{ asset('assets/images/Group 67.png') }}" class="canteen">
            </div>
        </section>

        <!-- Main Penjual section -->
        <section class="row2">
            <div class="container">
                @if ($mainPenjual)
                    <div class="bg-img" style="background-color:#6e0e12; padding: 1rem; border-radius:20px; width:50%;">
                        <img src="{{ asset('images/profile/' . $mainPenjual->foto) }}" alt="Kantin Anugrah" class="main-image" style="width:90%;" />
                    </div>
                    <div class="content">
                        <h1 class="title">{{ $mainPenjual->nama_kedai }}</h1>
                        <button class="primary-button">
                            <a href="{{ url('pembeli/tampilan_menu?id=' . $mainPenjual->id_penjual) }}" style="color:white; text-decoration:none;">
                                Ayo lihat {{ $mainPenjual->nama_kedai }}
                            </a>
                        </button>
                        <div class="image-gallery">
                            @foreach($menus as $menu)
                                <img src="{{ asset('images/menu/' . $menu->gambar_menu) }}" style="width:20rem; height:6rem;" alt="Food Item" class="gallery-image" />
                            @endforeach
                        </div>
                        <button class="primary-button">
                            <a href="{{ url('pembeli/kedai') }}" style="color:white;">Lihat semua kedai</a>
                        </button>
                    </div>
                @else
                    <p>Data Penjual utama tidak ditemukan.</p>
                @endif
            </div>

            <!-- Other Penjual section -->
            <div class="listkedai">
                @foreach($otherPenjual as $kedai)
                    <a href="{{ url('pembeli/tampilan_menu?id=' . $kedai->id_penjual) }}">
                        <div class="kedai1" style="background-color: #B6252A; width: 321.896px; height: 296px; position: relative;">
                            <div style="background-color: #801418; width: 321.896px; height: 296px; border-radius: 0 120px 0 0; position: relative;">
                                <p style="color: white; padding: 1.8rem; font-size:2rem;font-weight:bold;">{{ $kedai->nama_kedai }}</p>
                                <div style="background-color: #A75C5C; width: 199.418px; height: 202.892px; border-radius: 90px 0 0 0; position: absolute; right: 0; bottom: 0;">
                                    <img src="{{ asset('images/profile/' . $kedai->foto) }}" style="padding:1rem;" width="230px" height="130px" alt="">
                                </div>
                                <div style="background-color: #B6252A; width: 321.111px; height: 49.333px; border-radius: 0px 60px 0px 0px; position: absolute; bottom: 0; left: 0; right: 100px"></div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- About Us Section -->
        <section class="row3" id="about_us">
            <h1>Tentang Kami</h1>
            <div class="aboutus">
                <div class="relative">
                    <button id="prevBtn" class="carousel-button left">
                        <img src="{{ asset('assets/images/Next_page_kiri.png') }}" alt="">
                    </button>
                    <img id="carouselImg" src="{{ asset('assets/images/Group 66.png') }}" alt="Diversity in Unity" class="carousel-image" />
                    <button id="nextBtn" class="carousel-button right">
                        <img src="{{ asset('assets/images/Next_page_kanan.png') }}" alt="">
                    </button>
                </div>
            </div>
            <div class="keterangan">
                <p>Di 2024, Diversity in Unity terbentuk sebagai sebuah tim yang <br>
                    terdiri dari 3 mahasiswa jurusan D3 Rekayasa Perangkat Lunak <br>
                    Aplikasi Telkom University. Kami mengusulkan sebuah inovasi <br>
                    berupa Tel-Aneca untuk memudahkan transaksi di lingkungan <br>
                    kantin Telkom University.
                </p>
            </div>
        </section>
    </main>
    <script>
        const carouselImages = [
            'assets/images/Group 66.png',
            'assets/images/about_us.png',
        ];
        let currentImageIndex = 0;
        const carouselImg = document.getElementById('carouselImg');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        prevBtn.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex - 1 + carouselImages.length) % carouselImages.length;
            carouselImg.src = carouselImages[currentImageIndex];
        });

        nextBtn.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex + 1) % carouselImages.length;
            carouselImg.src = carouselImages[currentImageIndex];
        });
    </script>
    </x-slot:content>

</x-apppembeli>
