<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
        $validatedData = $request->validate([
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:9048',
            'category_id' => 'required|exists:categories,id',
            'location' => 'nullable',
            'camera' => 'nullable',
        ]);

        $imagePath = $request->file('image')->store('public/images');

        $image = new Image([
            'description' => $validatedData['description'],
            'url' => Storage::url($imagePath),
            'category_id' => $validatedData['category_id'],
            'location' => $validatedData['location'],
            'camera' => $validatedData['camera'],
            'status' => 'draft', // Set status as draft
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
        $validatedData = $request->validate([
            'description' => 'required',
            'url' => 'required|url',
            'location' => 'nullable',
            'camera' => 'nullable',
        ]);

        // Delete old image file if new image URL is uploaded
        if ($request->has('url') && $image->url !== $request->input('url')) {
            $this->deleteImageFile($image->url);
        }

        $image->update($validatedData);

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
        // Delete associated image file before deleting image model
        $this->deleteImageFile($image->url);

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
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);

        $image->comments()->create([
            'comment' => $validatedData['comment'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Comment added');
    }

    /**
     * Delete the image file from storage.
     *
     * @param  string  $url
     * @return void
     */
    protected function deleteImageFile($url)
    {
        $path = public_path($url);

        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
