<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Category Page',
            'category' => Category::all()
        );

        return view('admin.category', $data);
    }

    public function add(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/admin/category')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        Category::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/admin/category')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return redirect('/admin/category')->with('success', 'Data Berhasil Dihapus');
    }
}
