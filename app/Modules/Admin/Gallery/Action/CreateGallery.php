<?php

namespace App\Modules\Admin\Gallery\Action;

use App\Repositories\Interface\GalleryRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class CreateGallery
{
    protected GalleryRepositoryInterface $repository;

    public function __construct(GalleryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data): void
    {
        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $file = $data['picture_upload'];
            $filename = 'galleries/gallery_'.time().'.'.$file->getClientOriginalExtension();

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            $bucket->upload(
                file_get_contents($file->getRealPath()),
                ['name' => $filename]
            );

            $data['picture_upload'] = 'https://storage.googleapis.com/'.config('filesystems.disks.gcs.bucket').'/'.$filename;
        }

        $this->repository->create($data);
    }
}
