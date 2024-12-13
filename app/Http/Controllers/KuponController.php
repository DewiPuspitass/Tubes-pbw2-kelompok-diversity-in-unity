<?php

namespace App\Http\Controllers;

use App\Models\Kupon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KuponController extends Controller
{


    //tampilkan semua data
    public function index (){
        $vouchers = Kupon::all();

        // return view("penjual.voucher.tampil");
        return view('penjual.voucher.tampil', compact('vouchers'));
    }

    //tampilkan form tambah kupon
    public function create()
    {
        return view('penjual.voucher.tambah');
    }

    //simpan data kupon
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'status' => 'required|in:available,unavailable',
        ]);

        $data = $request->all();
        $data['id'] = Str::uuid();  
        Kupon::create($data);


        // Kupon::create($request->all());
        return redirect()->route('vouchers.index')->with('success', 'Kupon berhasil ditambahkan!');
    }

    public function destroy($id)
{
    // Temukan kupon berdasarkan ID
    $voucher = Kupon::find($id);

    // Periksa apakah kupon ditemukan
    if (!$voucher) {
        return redirect()->route('vouchers.index')->with('error', 'Kupon tidak ditemukan!');
    }

    // Hapus kupon
    $voucher->delete();

    // Kembalikan ke halaman daftar kupon dengan pesan sukses
    return redirect()->route('vouchers.index')->with('success', 'Kupon berhasil dihapus!');
}


    public function edit($id) {
        $voucher = Kupon::findOrFail($id);
        return view('penjual.voucher.edit', compact('voucher'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'status' => 'required|in:available,unavailable',
        ]);

        $voucher = Kupon::findOrFail($id);
        $voucher->update($request->all());

        return redirect()->route('vouchers.index')->with('success', 'Kupon berhasil diperbarui!');
    }

}
