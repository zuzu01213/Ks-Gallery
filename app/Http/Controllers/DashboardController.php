<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Constructor
    public function __construct()
    {
        $this->middleware('auth'); // Require authentication for all actions
    }

    // Display the main dashboard page
    public function index()
    {
        $images = Image::all();
        $categories = Category::all();
        return view('dashboard.index', compact('images', 'categories'));
    }

    // Upload a new image
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:11000',
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $title = $request->input('title');
        $imagePath = $request->file('image')->store('images', 'public');

        Image::create([
            'url' => $imagePath,
            'title' => $title,
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('dashboard.gallery.main')->with('success', 'Image uploaded successfully');
    }

    // Display the main gallery page
    public function main(Request $request)
    {
        $title = $request->input('title') ?: 'Default Title';
        $images = Image::all();
        $categories = Category::all();
        return view('dashboard.gallery.main', compact('images', 'title', 'categories'));
    }

    // Delete an image
    public function destroyImage($id)
    {
        $image = Image::find($id);

        if (!$image) {
            return redirect()->route('dashboard.main')->with('error', 'Image not found.');
        }

        Storage::delete($image->url);
        $image->delete();

        return redirect()->route('dashboard.main')->with('success', 'Image deleted successfully.');
    }

    // Update an image
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

        return redirect()->route('dashboard.main')->with('success', 'Image updated successfully.');
    }

    // Display the categories management page
    public function categories()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the user is an admin or operator
        if ($user->isAdmin() || $user->isOperator()) {
            $categories = Category::all();
            return view('dashboard.admin.categories', compact('categories'));
        } else {
            abort(403, 'Unauthorized');
        }
    }



    // Store a new category
    public function storeCategory(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        // Create a new category using the validated data
        Category::create([
            'name' => $request->input('name'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Category created successfully.');
    }

    // Show the form for editing a category
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.admin.categories.edit', compact('category'));
    }

    // Update the edited category
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}

