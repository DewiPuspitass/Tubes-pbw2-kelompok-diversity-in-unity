<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class MenuController extends Controller
{
    public function index()
    {
        $penjual = Auth::user();
        $menus = Menu::where('id_penjual', $penjual->id)->get();

        return view('penjual.menu.tampil', compact('penjual', 'menus'));
    }


    public function create(){
        $penjual = Auth::user();
        $kategori = Kategori::all();
        return view('penjual.menu.tambah', compact('penjual', 'kategori'));
    }

    public function store(Request $request)
    {
        $penjual = Auth::user();

        $create = $request->validate([
            'nama_menu' => 'required',
            'deskripsi_menu' => 'required',
            'harga_menu' => 'required|numeric',
            'id_kategori' => 'required',
            'gambar_menu' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $create['id_penjual'] = $penjual->id;

        if ($request->hasFile('gambar_menu')) {
            $create['gambar_menu'] = $request->file('gambar_menu')->store('menu_images', 'public');
        }

        Menu::create($create);

        return redirect()->route('tampilMenu')->with('success', 'Menu baru sudah dibuat');
    }

    public function edit($id)
    {
        $penjual = Auth::user();
        $menu = Menu::where('id_menu', $id)->firstOrFail();
        $kategori = Kategori::all();
        return view('penjual.menu.edit', compact('penjual', 'kategori', 'menu'));
    }

    public function update(Request $request, $id)
    {
        $penjual = Auth::user();
        $menu = Menu::where('id_menu', $id)->where('id_penjual', $penjual->id)->firstOrFail();

        $updateData = $request->validate([
            'nama_menu' => 'required',
            'deskripsi_menu' => 'required',
            'harga_menu' => 'required|numeric',
            'id_kategori' => 'required',
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu->nama_menu = $updateData['nama_menu'];
        $menu->deskripsi_menu = $updateData['deskripsi_menu'];
        $menu->harga_menu = $updateData['harga_menu'];
        $menu->id_kategori = $updateData['id_kategori'];

        if ($request->hasFile('gambar_menu')) {
            if ($menu->gambar_menu) {
                Storage::disk('public')->delete($menu->gambar_menu);
            }

            $menu->gambar_menu = $request->file('gambar_menu')->store('menu_images', 'public');
        }

        $menu->save();

        return redirect()->route('tampilMenu')->with('success', 'Menu berhasil diperbarui');
    }


}
