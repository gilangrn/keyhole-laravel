<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        $data = array(
            'title' => 'Order Page',
            'order' => Order::where('user_id', $userId)->get()
        );

        return view('admin.order', $data);
    }

    public function add(Request $request)
    {
        Order::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/admin/order')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        Order::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/admin/order')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        Order::where('id', $id)->delete();
        return redirect('/admin/order')->with('success', 'Data Berhasil Dihapus');
    }
}
