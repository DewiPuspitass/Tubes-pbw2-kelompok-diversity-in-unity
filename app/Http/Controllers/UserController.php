<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function index(Request $request){
        $user = User::latest()->paginate(5);

        return view('penjual.user.tampil', compact('user'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id'); 

        $userRole = $user->roles->pluck('name', 'id')->toArray();

        return view('penjual.user.edit', compact('user', 'roles', 'userRole'));
    }

    public function destroy($id)
    {
        $user = User::where('id',$id)->delete();
        return redirect()->route('manage_user')
                        ->with('success','User deleted successfully');
    }
}
