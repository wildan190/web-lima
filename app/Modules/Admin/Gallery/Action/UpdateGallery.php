<?php

namespace App\Modules\Admin\Gallery\Action;

use App\Models\Gallery;
use Google\Cloud\Storage\StorageClient;

class UpdateGallery
{
    public function execute($id, array $data): void
    {
        $gallery = Gallery::findOrFail($id);

        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $file = $data['picture_upload'];
            $filename = 'galleries/gallery_'.time().'.'.$file->getClientOriginalExtension();

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            // Hapus gambar lama dari GCS (jika ada dan URL valid)
            if ($gallery->picture_upload) {
                $oldPath = parse_url($gallery->picture_upload, PHP_URL_PATH);
                $oldPath = ltrim($oldPath, '/'); // Buang leading slash
                $bucket->object($oldPath)->delete();
            }

            // Upload gambar baru
            $bucket->upload(
                file_get_contents($file->getRealPath()),
                ['name' => $filename]
            );

            $data['picture_upload'] = 'https://storage.googleapis.com/'.config('filesystems.disks.gcs.bucket').'/'.$filename;
        }

        $gallery->update($data);
    }
}
