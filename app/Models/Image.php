<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'tags', 'location', 'camera', 'url', 'category_id', 'user_id', 'status'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->save();
    }

    public function publish()
    {
        $this->setStatus('published');
    }

    public function markAsDraft()
    {
        $this->setStatus('draft');
    }

    public function publishIfLikesReached($minLikes)
    {
        if ($this->likes_count >= $minLikes) {
            $this->publish();
        }
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
