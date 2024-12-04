<head>
    <link rel="stylesheet" href="{{ asset('assets/css/style_tampilan_menu.css') }}">
</head>
<body>
    <div class="left-panel">
        <a href="{{ route('Pesan.kedai') }}" class="custom-button" style="text-decoration:none">
            <img src="{{ asset('assets/images/Back-Arrow.png') }}" alt="Left Arrow Icon" class="icon" />
            <span class="text">{{ $penjual->name }}</span>
        </a>
        <div class="bg-nya">
            <p>Buka di Hari/Jam <br><i>Sen - Jum, 08:00 - 17:00</i></p>
        </div>
    </div>

    <div class="right-panel">
        <h2>Menu</h2>
        @foreach($menuItem as $menu)
            <div class="menu-item">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="flex: 1;">
                        <img src="{{ asset('images/menu/' . $menu->gambar_menu) }}" width="70px" height="70px" alt="{{ $menu->nama_menu }}" />
                        <h3>{{ $menu->nama_menu }}</h3>
                        <p>{{ $menu->deskripsi_menu }}</p>
                    </div>
                    <div>
                        <span>Rp. {{ $menu->harga_menu }}</span>
                        <button onclick="addToCart({{ $menu->id_menu }})">Tambah</button>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="bawah">
            <!-- Keranjang Belanja -->
            <div class="keranjang">
            <a href='{{route("keranjang.Pesan")}}' id="shopping-cart"><img src= "{{ asset('assets/images/shoppingcart.png') }}" alt=""  width="30px" height="30px"></a>


            </div>

            <!-- Pagination -->
            <div class="pagination-container">
                {{ $menuItem->links() }}
            </div>
        </div>
    </div>

    <script>
        function addToCart(menuId) {
            fetch('{{ route("keranjang.add") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ menu_id: menuId })


            })
            .then(response => response.json())
            .then(data => alert(data.message))
            .catch(error => alert('Error adding item to cart'));
        }
    </script>
</body>
