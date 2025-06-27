<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture_upload',
        'sport_id',
        'description',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
