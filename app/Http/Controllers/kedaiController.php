<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KedaiController extends Controller
{

        public function index(Request $request)
    {
        $search_term = $request->input('search', '');

    // Fetch paginated results with search and menus relation
    $penjuals = User::where('name', 'LIKE', "%$search_term%")
                       ->with(['menus' => function ($query) {
                           $query->limit(3);
                       }])
                       ->paginate(6);

    return view('Pesan.kedai', compact('penjuals'));
}

}
