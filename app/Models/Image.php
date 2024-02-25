<?php



namespace App\Models;

// app/Models/Image.php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Columns that can be mass assigned
    protected $fillable = ['title', 'description', 'url', ];

    /**
     * Get the likes for the image.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get the comments for the image.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Check if the image is liked by a specific user.
     */
    public function likedBy($userId)
    {
        return $this->likes->contains('user_id', $userId);
    }
}
