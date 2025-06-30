<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebProfile extends Model
{
    protected $fillable = [
        'web_name',
        'logo',
        'about',
        'vision',
        'mission',
        'history', // Added history field
    ];
}
