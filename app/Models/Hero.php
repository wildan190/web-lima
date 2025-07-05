<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{

    protected $table = 'heros';
    protected $fillable = [
        'picture_upload',
        'title',
        'subtitle',
    ];
}
