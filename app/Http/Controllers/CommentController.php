<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment; // Make sure to import the Comment model

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $imageId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $imageId)
    {
        // Validate the request data
        $request->validate([
            'user_name' => 'required|string|max:255',
            'comment_text' => 'required|string',
        ]);

        // Debugging: Dump request data and validation messages
        dd($request->all(), $request->validated());

        // Store the comment
        $comment = new Comment();
        $comment->image_id = $imageId;
        $comment->user_name = $request->input('user_name');
        $comment->comment_text = $request->input('comment_text');
        $comment->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Comment added successfully!');
    }

}
