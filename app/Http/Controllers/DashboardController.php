<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $user = auth()->user();
        $images = $user->images()->paginate(15);
        $categories = Category::all();
        return view('dashboard.index', compact('images', 'categories'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:11000',
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {
            $title = $request->input('title');
            $imagePath = $request->file('image')->store('images', 'public');
            $categoryId = $request->input('category_id');

            // Mendapatkan ID pengguna yang sedang masuk
            $userId = Auth::id();

            Image::create([
                'url' => $imagePath,
                'title' => $title,
                'category_id' => $categoryId,
                'user_id' => $userId, // Menyimpan ID pengguna yang mengunggah gambar
                'status' => 'draft', // Set status as draft
            ]);

            return redirect()->route('dashboard.gallery.main')->with('success', 'Image uploaded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to upload image. Please try again later.');
        }
    }

    public function destroyImage($id)
    {
        try {
            $image = Image::findOrFail($id);
            Storage::delete($image->url);
            $image->delete();

            return response()->json(['message' => 'Image deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete image'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:11000',
            'category_id' => 'required|exists:categories,id',
        ]);

        $image = Image::findOrFail($id);
        $image->title = $request->input('title');
        $image->category_id = $request->input('category_id');

        if ($request->hasFile('image')) {
            Storage::delete($image->url);
            $imagePath = $request->file('image')->store('images', 'public');
            $image->url = $imagePath;
        }

        $image->save();

        return redirect()->route('dashboard.gallery.main')->with('success', 'Image updated successfully.');
    }

    public function publishDraft(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:11000',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Image::create([
            'url' => $imagePath,
            'title' => 'Default Title',
            'category_id' => $request->input('category_id'),
            'status' => 'published',
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Image published successfully.');
    }
    public function main(Request $request)
    {
        $perPage = 15; // Number of items per page
        $query = $request->input('search');
        $categoryId = $request->input('category_id');

        // Start building the query
        $imagesQuery = Image::query();

        // Filter images by the currently logged-in user
        $imagesQuery->where('user_id', auth()->id());

        // Check if there's a search query
        if ($query) {
            $imagesQuery->where('title', 'like', '%' . $query . '%');
        }

        // Check if there's a category filter
        if ($categoryId) {
            $imagesQuery->where('category_id', $categoryId);
        }

        // Paginate the results
        $images = $imagesQuery->paginate($perPage); // Change the number to adjust the items per page

        // Get all categories
        $categories = Category::all();

        // Return the view with paginated images and categories
        return view('dashboard.gallery.main', compact('images', 'categories'));
    }

    public function destroySelected(Request $request)
{
    // Validate the request data
    $request->validate([
        'selected_images' => 'required|array',
        'selected_images.*' => 'exists:images,id',
    ]);

    try {
        // Get the IDs of the selected images from the request
        $selectedImageIds = $request->input('selected_images');

        // Find and delete the selected images
        Image::whereIn('id', $selectedImageIds)->delete();

        return redirect()->back()->with('success', 'Selected images deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to delete selected images.');
    }
}

}
