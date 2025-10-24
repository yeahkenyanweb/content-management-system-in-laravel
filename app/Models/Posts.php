<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    /** @use HasFactory<\Database\Factories\PostsFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'title', 'body','slug'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }


    public function comments()
    {
        return $this->morphMany(Comments::class, 'commentable');
    }
}
