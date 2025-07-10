<?php

namespace App\Modules\Admin\Milestone\Action;

use App\Repositories\Interface\MilestoneRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class DeleteMilestone
{
    public function __construct(protected MilestoneRepositoryInterface $repo) {}

    public function execute(int $id): void
    {
        $item = $this->repo->findById($id);

        if ($item->picture_upload) {
            $bucketName = config('filesystems.disks.gcs.bucket');
            $objectPath = str_replace('https://storage.googleapis.com/'.$bucketName.'/', '', $item->picture_upload);

            if (! empty($objectPath)) {
                $storage = new StorageClient([
                    'projectId' => config('filesystems.disks.gcs.project_id'),
                    'keyFilePath' => config('filesystems.disks.gcs.key_file'),
                ]);

                $bucket = $storage->bucket($bucketName);
                $object = $bucket->object($objectPath);

                if ($object->exists()) {
                    $object->delete();
                }
            }
        }

        $this->repo->delete($id);
    }
}
