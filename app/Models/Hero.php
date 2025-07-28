<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hero extends Model
{
    use HasTranslations;

    protected $table = 'heros';

    protected $fillable = [
        'picture_upload',
        'title',
        'subtitle',
    ];

    public $translatable = ['title', 'subtitle'];
}
