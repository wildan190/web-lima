<?php

namespace App\Modules\Admin\Milestone\Action;

use App\Repositories\Interface\MilestoneRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class UpdateMilestone
{
    public function __construct(protected MilestoneRepositoryInterface $repo) {}

    public function execute(int $id, array $data): void
    {
        $item = $this->repo->findById($id);

        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $file = $data['picture_upload'];
            $filename = 'milestones/milestone_'.time().'.'.$file->getClientOriginalExtension();

            // Inisialisasi Google Cloud Storage
            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            // Upload file baru ke GCS
            $bucket->upload(file_get_contents($file->getRealPath()), [
                'name' => $filename,
            ]);

            // Update data gambar dengan URL baru
            $data['picture_upload'] = 'https://storage.googleapis.com/'.config('filesystems.disks.gcs.bucket').'/'.$filename;
        } else {
            unset($data['picture_upload']);
        }

        $this->repo->update($id, $data);
    }
}
