<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class DashboardController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('dashboard.index', compact('images'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        Image::create(['nama_file' => $imageName]);

        return redirect()->back()->with('success', 'Gambar berhasil diupload!');
    }
}


