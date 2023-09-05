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
}
