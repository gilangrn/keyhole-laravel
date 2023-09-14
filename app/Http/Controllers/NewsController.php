<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'News Page',
            'news' => News::all()
        );

        return view('admin.news', $data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);

        News::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'author' => $request->author,
            'category' => $request->category,
            'image' => $imageName,
        ]);

        return redirect('/admin/news')->with('success', 'Data Berhasil Disimpan');
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

        News::where('id', $id)->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'author' => $request->author,
            'category' => $request->category,
            'image' => $imageName,
        ]);

        return redirect('/admin/news')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        News::where('id', $id)->delete();
        return redirect('/admin/news')->with('success', 'Data Berhasil Dihapus');
    }
}
