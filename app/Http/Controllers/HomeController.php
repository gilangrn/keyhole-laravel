<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home Page',
            'product' => Product::all(),
            'news' => News::all(),
        );

        return view('home', $data);
    }

    public function cart()
    {
        $data = array(
            'title' => 'Cart Page'
        );

        return view('home.cart', $data);
    }

    public function blog()
    {
        $data = array(
            'title' => 'Blog Page',
            'news' => News::all()
        );

        return view('home.blog', $data);
    }

    public function blogDetail($id)
    {

        $data = array(
            'title' => 'Blog Page',
            'news' => News::where('id', $id)->first()
        );

        return view('home.blogDetail', $data);
    }

    public function order()
    {
        $userId = Auth::user()->id;

        $data = array(
            'title' => 'Order Page',
            'order' => Order::where('user_id', $userId)->get()
        );

        return view('home.order', $data);
    }

    public function contact()
    {
        $data = array(
            'title' => 'Contact Page'
        );

        return view('home.contact', $data);
    }

    public function productDetail($id)
    {

        $data = array(
            'title' => 'Product Page',
            'product' => Product::where('id', $id)->first()
        );

        return view('home.productDetail', $data);
    }
}
