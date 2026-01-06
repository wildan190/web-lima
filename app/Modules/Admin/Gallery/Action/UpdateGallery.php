<?php

namespace App\Modules\Admin\Gallery\Action;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class UpdateGallery
{
    public function execute($id, array $data): void
    {
        $gallery = Gallery::findOrFail($id);

        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $file = $data['picture_upload'];
            $filename = 'galleries/gallery_'.time().'.'.$file->getClientOriginalExtension();

            if ($gallery->picture_upload) {
                $urlPath = parse_url($gallery->picture_upload, PHP_URL_PATH);
                if ($urlPath && str_contains($urlPath, '/storage/')) {
                    $relativePath = ltrim(str_replace('/storage/', '', $urlPath), '/');
                    Storage::disk('public')->delete($relativePath);
                }
            }

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));

            $data['picture_upload'] = Storage::url($filename);
        }

        $gallery->update($data);
    }
}
