<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Payment Page',
            'payment' => Payment::all()
        );

        return view('admin.payment', $data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);

        Payment::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'account_number' => $request->account_number,
        ]);

        return redirect('/admin/payment')->with('success', 'Data Berhasil Disimpan');
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

        Payment::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'account_number' => $request->account_number,
        ]);

        return redirect('/admin/payment')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        Payment::where('id', $id)->delete();
        return redirect('/admin/payment')->with('success', 'Data Berhasil Dihapus');
    }
}
