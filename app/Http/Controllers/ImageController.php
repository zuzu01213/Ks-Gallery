<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    /**
     * Display a listing of images.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $images = Image::all();
        return view('gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new image.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created image in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('public/images');

        // Simpan informasi gambar ke database
        $image = new Image([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'url' => $request->input('url'),
            'image_path' => $imagePath,
        ]);

        $image->save();

        return redirect()->route('gallery.index')->with('success', 'Image added successfully');
    }

    /**
     * Display the specified image.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\View\View
     */
    public function show(Image $image)
    {
        $comments = $image->comments;
        return view('gallery.show', compact('image', 'comments'));
    }

    /**
     * Show the form for editing the specified image.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\View\View
     */
    public function edit(Image $image)
    {
        return view('gallery.edit', compact('image'));
    }

    /**
     * Update the specified image in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Remove the specified image from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully');
    }

    /**
     * Increment the like count for the specified image.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function like(Image $image)
    {
        $image->increment('likes');
        return redirect()->back()->with('success', 'Image liked');
    }

    /**
     * Increment the dislike count for the specified image.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function dislike(Image $image)
    {
        $image->increment('dislikes');
        return redirect()->back()->with('success', 'Image disliked');
    }

    /**
     * Add a new comment to the specified image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment(Request $request, Image $image)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment([
            'comment' => $request->input('comment'),
            'user_id' => auth()->user()->id, // Assuming you have authentication
        ]);

        $image->comments()->save($comment);

        return redirect()->back()->with('success', 'Comment added');
    }
}
