<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebContact extends Model
{
    protected $fillable = [
        'phone',
        'email',
        'address',
        'instagram',
        'facebook',
        'linkedin',
        'youtube',
    ];
}
