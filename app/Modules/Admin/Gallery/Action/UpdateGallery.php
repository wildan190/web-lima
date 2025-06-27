<?php

namespace App\Modules\Admin\Gallery\Action;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class UpdateGallery
{
    public function execute($id, array $data)
    {
        $gallery = Gallery::findOrFail($id);

        if (isset($data['picture_upload'])) {
            if ($gallery->picture_upload && Storage::disk('public')->exists($gallery->picture_upload)) {
                Storage::disk('public')->delete($gallery->picture_upload);
            }
            $data['picture_upload'] = $data['picture_upload']->store('galleries', 'public');
        }

        $gallery->update($data);
    }
}
