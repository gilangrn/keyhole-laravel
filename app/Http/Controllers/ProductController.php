<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Product Page',
            'product' => Product::all(),
            'category' => Category::all(),
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

    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "id" => $product->id,
                        "name" => $product->name,
                        "qty" => 1,
                        "amount" => $product->price,
                        "image" => $product->image
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "qty" => 1,
            "amount" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
