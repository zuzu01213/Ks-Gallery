<?php



// app/Http/Controllers/ImageController.php
namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Comment;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('gallery.index', compact('images'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required|url',
        ]);

        Image::create($request->all());

        return redirect()->route('gallery.index')->with('success', 'Image added successfully');
    }

    public function show(Image $image)
    {
        $comments = $image->comments;
        return view('gallery.show', compact('image', 'comments'));
    }

    public function edit(Image $image)
    {
        return view('gallery.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required|url',
        ]);

        $image->update($request->all());

        return redirect()->route('gallery.index')->with('success', 'Image updated successfully');
    }

    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully');
    }

    // Tambahkan fungsi untuk like/dislike dan komentar
}
