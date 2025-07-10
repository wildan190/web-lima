<?php

namespace App\Modules\Admin\Sport\Action;

use App\Repositories\Interface\SportRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class DeleteSport
{
    public function __construct(protected SportRepositoryInterface $repo) {}

    public function handle($id): void
    {
        $item = $this->repo->find($id);

        if ($item->logo && str_starts_with($item->logo, 'https://storage.googleapis.com/')) {
            $parsed = parse_url($item->logo);
            $path = ltrim($parsed['path'], '/');

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);
            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            $object = $bucket->object($path);
            if ($object->exists()) {
                $object->delete();
            }
        }

        $this->repo->delete($id);
    }
}
