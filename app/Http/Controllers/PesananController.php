<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;

class PesananController extends Controller
{
    public function index()
    {

        $mainPenjual = User::orderBy('id', 'asc')->first();


        if (!$mainPenjual) {
            return redirect()->route('fallback.route')->with('error', 'Main Penjual not found.');
        }


        $menus = Menu::where('id_penjual', $mainPenjual->id_penjual)->take(3)->get();

        $otherPenjual = User::where('id', '!=', $mainPenjual->id_penjual)->take(3)->get();

        return view('pesan.index', compact('mainPenjual', 'menus', 'otherPenjual'));
    }
}
