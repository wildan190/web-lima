<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'sport_id',
        'location',
        'description',
        'picture_upload',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
