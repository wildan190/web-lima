<?php

namespace App\Modules\Admin\Gallery\Action;

use App\Models\Gallery;

class GetGallery
{
    public function execute()
    {
        return Gallery::with('sport')->latest()->get();
    }

    public function find($id)
    {
        return Gallery::findOrFail($id);
    }
}
