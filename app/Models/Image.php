<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = ['title', 'description', 'url'];

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
