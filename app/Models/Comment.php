<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['image_id', 'user_name', 'comment_text'];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
