<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeliveryController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Delivery Page',
            'delivery' => Delivery::all()
        );

        return view('admin.delivery', $data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);

        Delivery::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'shipping_cost' => $request->shipping_cost,
        ]);

        return redirect('/admin/delivery')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($request->image) {
                Storage::delete('public/images/' . $request->image);
            }
        }


        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);

        Delivery::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'shipping_cost' => $request->shipping_cost,
        ]);

        return redirect('/admin/delivery')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        Delivery::where('id', $id)->delete();
        return redirect('/admin/delivery')->with('success', 'Data Berhasil Dihapus');
    }
}
