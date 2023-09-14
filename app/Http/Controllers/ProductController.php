<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
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
        if (isset($cart[$id])) {
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
        return redirect('/shopping-cart')->with('success', 'Data Berhasil Ditambah');
    }

    public function checkout()
    {
        $currentTime = Carbon::now();
        $formattedTime = date('YmdHis', strtotime($currentTime));
        $total = 0;

        foreach (session('cart') as $id => $details) {
            $total += $details['amount'] * $details['qty'];
        }

        $orderId = Order::insertGetId([
            'order_id' => '#ORDER'.str_pad($formattedTime, 12, "0", STR_PAD_LEFT),
            'order_date' => $currentTime,
            'payment_method_id' => 1,
            'delivery_type_id' => 1,
            'user_id' => Auth::user()->id,
            'user_address_id' => 1,
            'total_product_price' => 1,
            'delivery_price' => 1,
            'service_price' => 1,
            'total_amount' => $total,
            'status' => 1,
        ]);

        foreach (session('cart') as $id => $details) {
            OrderDetail::create([
                'order_id' => $orderId,
                'product_id' => $details['id'],
                'qty' => $details['qty'],
                'amount' => $details['amount'],
            ]);
        }

        session()->forget('cart');

        return redirect('/order')->with('success', 'Data Berhasil Ditambah');
    }
}
