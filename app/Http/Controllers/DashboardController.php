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
            'category_id' => 'required|exists:categories,id',
            'camera' => 'nullable|string',
            'location' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        try {
            $imagePath = $request->file('image')->store('images', 'public');
            $categoryId = $request->input('category_id');
            $camera = $request->input('camera');
            $location = $request->input('location');
            $tags = $request->input('tags');

            $userId = Auth::id();

            Image::create([
                'url' => $imagePath,
                'category_id' => $categoryId,
                'user_id' => $userId,
                'status' => 'draft',
                'camera' => $camera,
                'location' => $location,
                'tags' => $tags,
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:11000',
            'category_id' => 'required|exists:categories,id',
            'camera' => 'nullable|string',
            'location' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        $image = Image::findOrFail($id);
        $image->category_id = $request->input('category_id');
        $image->camera = $request->input('camera');
        $image->location = $request->input('location');
        $image->tags = $request->input('tags');

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
            'category_id' => $request->input('category_id'),
            'status' => 'published',
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Image published successfully.');
    }

    public function main(Request $request)
    {
        $perPage = $request->input('perPage', 15);
        if ($perPage === 'all') {
            $perPage = Image::where('user_id', auth()->id())->count();
        }
        $query = $request->input('search');
        $categoryId = $request->input('category_id');

        $imagesQuery = Image::query();
        $imagesQuery->where('user_id', auth()->id());

        if ($query) {
            $imagesQuery->where('description', 'like', '%' . $query . '%');
        }

        if ($categoryId) {
            $imagesQuery->where('category_id', $categoryId);
        }

        $images = $imagesQuery->paginate($perPage);
        $categories = Category::all();

        return view('dashboard.gallery.main', compact('images', 'categories'));
    }

    public function destroySelected(Request $request)
    {
        $request->validate([
            'selected_images' => 'required|array',
            'selected_images.*' => 'exists:images,id',
        ]);

        try {
            $selectedImageIds = $request->input('selected_images');
            Image::whereIn('id', $selectedImageIds)->delete();

            return redirect()->back()->with('success', 'Selected images deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete selected images.');
        }
    }
}
