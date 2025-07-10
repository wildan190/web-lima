<?php

namespace App\Modules\Admin\Milestone\Action;

use App\Repositories\Interface\MilestoneRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class CreateMilestone
{
    public function __construct(protected MilestoneRepositoryInterface $repo) {}

    public function execute(array $data): void
    {
        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $file = $data['picture_upload'];
            $filename = 'milestones/milestone_'.time().'.'.$file->getClientOriginalExtension();

            // Inisialisasi GCS
            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            // Upload file ke GCS tanpa predefined ACL
            $bucket->upload(file_get_contents($file->getRealPath()), [
                'name' => $filename,
            ]);

            // Simpan URL GCS ke database
            $data['picture_upload'] = 'https://storage.googleapis.com/'.config('filesystems.disks.gcs.bucket').'/'.$filename;
        }

        $this->repo->create($data);
    }
}
