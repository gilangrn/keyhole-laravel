<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Product Page',
            'product' => Product::all()
        );

        return view('admin.product', $data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);

        Product::create([
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        return redirect('/admin/product')->with('success', 'Data Berhasil Disimpan');
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

        Product::where('id', $id)->update([
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        return redirect('/admin/product')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect('/admin/product')->with('success', 'Data Berhasil Dihapus');
    }
}
