<?php

namespace App\Modules\Admin\UniversityCoverage\Action;

use App\Repositories\Interface\UniversityCoverageRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class DeleteUniversityCoverage
{
    public function __construct(protected UniversityCoverageRepositoryInterface $repo) {}

    public function handle($id)
    {
        $item = $this->repo->findById($id);

        if ($item && $item->logo) {
            $filePath = parse_url($item->logo, PHP_URL_PATH);
            $objectName = ltrim($filePath, '/');

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            $object = $bucket->object($objectName);
            if ($object->exists()) {
                $object->delete();
            }
        }

        return $this->repo->delete($id);
    }
}
