<?php

namespace App\Modules\Admin\Gallery\Action;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class DeleteGallery
{
    public function execute($id): void
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->picture_upload) {
            $urlPath = parse_url($gallery->picture_upload, PHP_URL_PATH);
            if ($urlPath && str_contains($urlPath, '/storage/')) {
                $relativePath = ltrim(str_replace('/storage/', '', $urlPath), '/');
                Storage::disk('public')->delete($relativePath);
            }
        }

        $gallery->delete();
    }
}
