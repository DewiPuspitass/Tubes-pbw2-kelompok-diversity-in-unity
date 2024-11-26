<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;




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

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|same:confirm-password',
            'roles' => 'required|array',
        ]);

        $input = $request->all();

        if (!empty($input['password'])) { 
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);    
        }

        $user = User::findOrFail($id);
        $user->update($input);

        $user->syncRoles($request->input('roles'));

        return redirect()->route('penjual.user.tampil')
                        ->with('success', 'User updated successfully');
    }



    public function destroy($id)
    {
        $user = User::where('id',$id)->delete();
        return redirect()->route('manage_user')
                        ->with('success','User deleted successfully');
    }
}
