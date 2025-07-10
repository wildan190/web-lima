<?php

namespace App\Modules\Admin\MilestoneBanner\Action;

use App\Repositories\Interface\MilestoneBannerRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class CreateOrUpdate
{
    public function __construct(protected MilestoneBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture']) && $data['upload_picture']->isValid()) {
            $file = $data['upload_picture'];
            $filename = 'milestone_banner/milestone_'.time().'.'.$file->getClientOriginalExtension();

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            // Upload tanpa predefinedAcl, untuk uniform bucket-level access
            $bucket->upload(file_get_contents($file->getRealPath()), [
                'name' => $filename,
            ]);

            $data['upload_picture'] = 'https://storage.googleapis.com/'.config('filesystems.disks.gcs.bucket').'/'.$filename;
        }

        $this->repository->updateOrCreate([], $data);
    }
}
