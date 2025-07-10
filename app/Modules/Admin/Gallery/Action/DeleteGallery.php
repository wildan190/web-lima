<?php

namespace App\Modules\Admin\Gallery\Action;

use App\Models\Gallery;
use Google\Cloud\Storage\StorageClient;

class DeleteGallery
{
    public function execute($id): void
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->picture_upload) {
            $filePath = ltrim(parse_url($gallery->picture_upload, PHP_URL_PATH), '/');

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            $object = $bucket->object($filePath);
            if ($object->exists()) {
                $object->delete();
            }
        }

        $gallery->delete();
    }
}
