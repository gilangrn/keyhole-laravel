<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Admin Page'
        );

        return view('admin.dashboard', $data);
    }

    public function order()
    {
        $data = array(
            'title' => 'Order Page'
        );

        return view('admin.order', $data);
    }

    public function payment()
    {
        $data = array(
            'title' => 'Setting Payment Page'
        );

        return view('admin.payment', $data);
    }

    public function delivery()
    {
        $data = array(
            'title' => 'Setting Delivery Page'
        );

        return view('admin.delivery', $data);
    }

    public function user()
    {
        $data = array(
            'title' => 'Setting User Page'
        );

        return view('admin.user', $data);
    }
}
