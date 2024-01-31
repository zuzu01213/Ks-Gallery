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
        // Validasi request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:11000', // Sesuaikan dengan kebutuhan, di sini batasnya dinaikkan menjadi 11000 KB (11 MB)
        ]);


        // Simpan gambar ke dalam direktori storage
        $imagePath = $request->file('image')->store('images', 'public');

        // Simpan informasi gambar di basis data
        Image::create(['url' => $imagePath]);

        return redirect()->route('dashboard.gallery.main')->with('success', 'Image uploaded successfully');

    }

    public function main()
    {
        $images = Image::all();
        return view('dashboard.gallery.main', compact('images'));
    }

}
