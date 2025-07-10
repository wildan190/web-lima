<?php

namespace App\Modules\Admin\News\Action;

use App\Repositories\Interface\NewsRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class DeleteNews
{
    public function __construct(protected NewsRepositoryInterface $repository) {}

    public function execute($id)
    {
        $item = $this->repository->findById($id);

        if ($item && $item->picture_upload) {
            $url = $item->picture_upload;
            $bucketName = config('filesystems.disks.gcs.bucket');

            // Ekstrak nama file dari URL
            $parsed = parse_url($url);
            $objectName = ltrim($parsed['path'], '/');

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket($bucketName);

            if ($bucket->object($objectName)->exists()) {
                $bucket->object($objectName)->delete();
            }
        }

        $this->repository->delete($id);
    }
}
