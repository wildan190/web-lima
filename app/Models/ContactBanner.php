<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'upload_picture',
        'title',
        'subtitle',
    ];
}
