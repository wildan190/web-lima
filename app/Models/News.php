<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'category', // Tambahkan kolom category
    ];
}
