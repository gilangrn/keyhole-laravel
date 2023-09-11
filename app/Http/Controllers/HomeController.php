<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home Page',
            'product' => Product::all()
        );

        return view('home', $data);
    }

    public function cart()
    {
        $data = array(
            'title' => 'Cart Page'
        );

        return view('cart.cart', $data);
    }

    public function blog()
    {
        $data = array(
            'title' => 'Blog Page'
        );

        return view('blog.blog', $data);
    }

    public function tracking()
    {
        $data = array(
            'title' => 'Tracking Page'
        );

        return view('order.tracking', $data);
    }

    public function contact()
    {
        $data = array(
            'title' => 'Contact Page'
        );

        return view('contact.contact', $data);
    }

    public function productDetail($id)
    {
        $product = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->where('product.id', $id)
            ->get()
            ->first();

        $data = array(
            'title' => 'Product Page',
            'product' => $product
        );

        return view('product.detail', $data);
    }
}
