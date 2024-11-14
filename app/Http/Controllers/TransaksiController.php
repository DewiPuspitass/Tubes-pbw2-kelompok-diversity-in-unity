<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KeranjangDetail;


class TransaksiController extends Controller
{
    public function indexTransaksi(){
        $penjual = Auth::guard('penjual')->user();
        // $keranjangDetail = KeranjangDetail::where('id_penjual', $penjual->id_penjual)->get();

        return view('penjual.transaksi.tampilTransaksi', compact('penjual'));
    }

    public function indexKonfirmasi(){
        $penjual = Auth::guard('penjual')->user();
        // $keranjangDetail = KeranjangDetail::where('id_penjual', $penjual->id_penjual)->get();

        return view('penjual.transaksi.tampilKonfirmasi', compact('penjual'));
    }
}
