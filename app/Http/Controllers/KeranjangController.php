<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class KeranjangController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        $cart = session('cart', []); // Ambil data keranjang dari session
        $totalPrice = 0;


    if (!empty($cart)) {
        // Ambil semua menu berdasarkan ID
        $menuIds = array_column($cart, 'id_menu');
        $menus = Menu::whereIn('id_menu', $menuIds)->get()->keyBy('id_menu'); // Ambil menu dengan indeks ID

        // Proses setiap item dalam keranjang
        if (!empty($cart)) {
            foreach ($cart as $index => $item) {
                if (!isset($item['id_menu'])) {
                    continue; // Lewati item yang tidak memiliki 'id_menu'
                }

                $menu = Menu::find($item['id_menu']);
                if ($menu) {
                    $cart[$index]['menu'] = $menu;
                    $cart[$index]['item_total'] = $menu->harga_menu * $item['quantity'];
                    $totalPrice += $cart[$index]['item_total'];
                }
            }
        }

    }
    // dd($cart);

    // Kirim data ke view
    return view('Pesan.keranjang', compact('cart', 'totalPrice'));
}




    // Menambahkan item ke keranjang
    public function addToCart(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menu,id_menu',
        ]);

        $menuId = $request->menu_id;

        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Jika item sudah ada di keranjang, tambahkan jumlahnya
        if (isset($cart[$menuId])) {
            $cart[$menuId]['quantity'] += 1;
        } else {
            // Jika belum ada, tambahkan item baru
            $menu = Menu::findOrFail($menuId);
            $cart[$menuId] = [
                'id_menu' => $menu->id_menu,
                'gambar_menu' => $menu->gambar_menu,
                'nama_menu' => $menu->nama_menu,
                'harga_menu' => $menu->harga_menu,
                'quantity' => 1,
            ];
        }
        session()->put('cart', $cart);

        return response()->json(['message' => 'Item berhasil ditambahkan ke keranjang']);
    }

    // Menghapus item dari keranjang
    public function removeFromCart(Request $request)
    {
        $menuId = $request->input('id_menu');
        $cart = session('cart', []);

        if (isset($cart[$menuId])) {
            unset($cart[$menuId]);
        }

        session(['cart' => $cart]);

        return response()->json(['status' => 'success']);
    }

    // Mengupdate jumlah item di keranjang
    public function updateCart(Request $request)
    {
        $menuId = $request->input('id_menu');
        $quantity = $request->input('quantity');

        $cart = session('cart', []);
        if (isset($cart[$menuId])) {
            $cart[$menuId]['quantity'] = $quantity;
        }

        session(['cart' => $cart]);

        return response()->json(['status' => 'success']);
    }
}
