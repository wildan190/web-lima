<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WebProfile extends Model
{
    use HasTranslations;

    protected $fillable = [
        'web_name',
        'logo',
        'about',
        'vision',
        'mission',
        'history',
    ];

    public array $translatable = [
        'about',
        'vision',
        'mission',
        'history',
    ];
}
