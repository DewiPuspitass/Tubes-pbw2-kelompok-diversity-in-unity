<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index() {
        $penjual = Auth::user(); 
        
        $menu = Menu::all()->count();
        $transaksi = Keranjang::where('status_pemesanan', 'selesai')->count();
        $keranjang = Keranjang::with(['pembayaran' => function ($query) {
            $query->where('status_konfirmasi', 'pending');
        }])->where('id_penjual', $penjual->id)->get();

        return view('penjual.dashboard', compact('penjual', 'keranjang', 'menu', 'transaksi'));
    }
    
}
