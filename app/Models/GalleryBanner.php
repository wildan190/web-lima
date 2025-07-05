<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryBanner extends Model
{
    protected $fillable = [
        'upload_picture',
        'title',
        'subtitle',
    ];
}
