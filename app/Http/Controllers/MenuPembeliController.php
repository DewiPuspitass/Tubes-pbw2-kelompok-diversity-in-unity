<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\User;

class MenuPembeliController extends Controller
{
    public function index($id)
    {
        $penjual = User::findOrFail($id);
        $menuItem = Menu::where('id_penjual', $id)->paginate(4);
        return view('Pesan.menu', compact('penjual', 'menuItem'));
    }

    // public function addToCart(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'menu_id' => 'required|exists:menu,id_menu',
    //     ]);

    //     $menuId = $request->menu_id;

    //     // Ambil keranjang dari session
    //     $cart = session()->get('cart', []);

    //     // Jika item sudah ada di keranjang, tambahkan jumlahnya
    //     if (isset($cart[$menuId])) {
    //         $cart[$menuId]['quantity'] += 1;
    //     } else {
    //         // Jika belum ada, tambahkan item baru
    //         $menu = Menu::findOrFail($menuId);
    //         $cart[$menuId] = [
    //             'id_menu' => $menu->id_menu,
    //             'nama_menu' => $menu->nama_menu,
    //             'harga_menu' => $menu->harga_menu,
    //             'quantity' => 1,
    //         ];
    //     }
    //     session()->put('cart', $cart);

    //     return response()->json(['message' => 'Item berhasil ditambahkan ke keranjang']);
    // }
}
