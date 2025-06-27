<?php

namespace App\Modules\Admin\Gallery\Action;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class DeleteGallery
{
    public function execute($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->picture_upload && Storage::disk('public')->exists($gallery->picture_upload)) {
            Storage::disk('public')->delete($gallery->picture_upload);
        }

        $gallery->delete();
    }
}
