<?php

namespace App\Modules\Admin\GalleryBanner\Action;

use App\Repositories\Interface\GalleryBannerRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class CreateOrUpdate
{
    public function __construct(protected GalleryBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture']) && $data['upload_picture']->isValid()) {
            $file = $data['upload_picture'];
            $filename = 'gallery_banner/gallery_'.time().'.'.$file->getClientOriginalExtension();

            // Inisialisasi Google Cloud Storage client
            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            // Upload file ke bucket tanpa predefinedAcl
            $bucket->upload(
                file_get_contents($file->getRealPath()),
                [
                    'name' => $filename,
                ]
            );

            // Simpan URL file GCS
            $data['upload_picture'] = 'https://storage.googleapis.com/'.config('filesystems.disks.gcs.bucket').'/'.$filename;
        }

        // Simpan data ke repository
        $this->repository->updateOrCreate([], $data);
    }
}
