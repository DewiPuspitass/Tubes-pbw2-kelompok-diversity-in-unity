<x-apppembeli>
    <x-slot name="content">
        <div class="container">
            <h1>Keranjang Belanja</h1>
            @if (count($cart) > 0)

                @foreach ($cart as $item)

                    <div class="cart-item">
                        <!-- Gambar Menu -->
                        <img src="{{ asset('images/menu/' . $item['menu']->gambar_menu) }}"
                             alt="{{ $item['menu']->nama_menu }}"
                             width="100">

                        <!-- Informasi Item -->
                        <h3>{{ $item['menu']->nama_menu }}</h3>
                        <p>Harga: Rp {{ number_format($item['menu']->harga_menu, 0, ',', '.') }}</p>
                        <p>Jumlah: {{ $item['quantity'] }}</p>
                        <p>Total: Rp {{ number_format($item['item_total'], 0, ',', '.') }}</p>

                        <!-- Tombol Hapus -->
                        <button class="btn btn-danger" onclick="removeItem({{ $item['id_menu'] }})">Hapus</button>
                    </div>
                @endforeach


                <!-- Total Harga -->
                <h2>Total Harga: Rp {{ number_format($totalPrice, 0, ',', '.') }}</h2>

                <!-- Tombol Checkout -->
                <button class="btn btn-primary">Checkout</button>

            @else
                <p>Keranjang kosong.</p>
            @endif


        </div>

        <!-- JavaScript -->
        <script>
            function removeItem(menuId) {
                fetch('{{ route('keranjang.remove') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id_menu: menuId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        location.reload(); // Reload halaman setelah item dihapus
                    } else {
                        alert('Gagal menghapus item dari keranjang.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan.');
                });
            }
        </script>
    </x-slot>
</x-apppembeli>
