<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'picture_upload',
        'content',
        'tag',
        'keywords',
        'status',
        'category',
    ];

    protected static function booted()
    {
        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
    }
}
