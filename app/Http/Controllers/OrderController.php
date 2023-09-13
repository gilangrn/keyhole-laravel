<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Order Page',
            'order' => Order::all()
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
