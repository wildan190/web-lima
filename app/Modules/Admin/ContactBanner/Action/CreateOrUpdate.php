<?php

namespace App\Modules\Admin\ContactBanner\Action;

use App\Repositories\Interface\ContactBannerRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class CreateOrUpdate
{
    public function __construct(protected ContactBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture']) && $data['upload_picture']->isValid()) {
            $file = $data['upload_picture'];
            $filename = 'contact_banner/contact_'.time().'.'.$file->getClientOriginalExtension();

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
