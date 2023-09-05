<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'User Page',
            'user' => User::all()
        );

        return view('admin.user', $data);
    }

    public function add(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect('/admin/user')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect('/admin/user')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('/admin/user')->with('success', 'Data Berhasil Dihapus');
    }
}
