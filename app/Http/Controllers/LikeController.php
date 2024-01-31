<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request, $imageId)
    {
        $user = Auth::user();

        // Check if the user has already liked the image
        $existingLike = Like::where('user_id', $user->id)
                            ->where('image_id', $imageId)
                            ->first();

        // If the user has already liked the image, remove the like (unlike)
        if ($existingLike) {
            $existingLike->delete();
            return redirect()->back()->with('success', 'Image unliked successfully.');
        }

        // If the user has not liked the image, create a new like
        $like = new Like();
        $like->user_id = $user->id;
        $like->image_id = $imageId;
        $like->save();

        return redirect()->back()->with('success', 'Image liked successfully.');
    }
}
