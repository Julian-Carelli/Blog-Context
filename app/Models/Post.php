<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'user_id',
        'category_id',
        'status_posts_id',
        'title',
        'image',
        'key_image',
        'content',
        'is_validate',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }

    public function getGetImageAttribute()
    {
        if($this->image){
            return url("storage/$this->image");
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function statusPost()
    {
        return $this->belongsTo(StatusPosts::class, 'status_posts_id');
    }

    public function getGetContentAttribute()
    {
        return substr($this->content, 0, 800);
    }
}
