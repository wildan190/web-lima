<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MilestioneBanner extends Model
{
    protected $fillable = [
        'upload_picture',
        'title',
        'subtitle',
    ];
}
