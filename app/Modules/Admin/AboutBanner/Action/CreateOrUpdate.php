<?php

namespace App\Modules\Admin\AboutBanner\Action;

use App\Repositories\Interface\AboutBannerRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class CreateOrUpdate
{
    public function __construct(protected AboutBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture']) && $data['upload_picture']->isValid()) {
            $file = $data['upload_picture'];
            $filename = 'about_banner/about_'.time().'.'.$file->getClientOriginalExtension();

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            $bucket->upload(file_get_contents($file->getRealPath()), [
                'name' => $filename,
            ]);

            $data['upload_picture'] = 'https://storage.googleapis.com/'.config('filesystems.disks.gcs.bucket').'/'.$filename;
        }

        $existing = $this->repository->first();
        if ($existing) {
            $this->repository->update($existing->id, $data);
        } else {
            $this->repository->create($data);
        }
    }
}
