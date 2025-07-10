<?php

namespace App\Modules\Admin\News\Action;

use App\Repositories\Interface\NewsRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class CreateNews
{
    public function __construct(protected NewsRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $file = $data['picture_upload'];
            $filename = 'news/news_'.time().'.'.$file->getClientOriginalExtension();

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            // Upload file tanpa predefinedAcl (karena pakai Uniform Bucket-Level Access)
            $bucket->upload(file_get_contents($file->getRealPath()), [
                'name' => $filename,
            ]);

            $data['picture_upload'] = 'https://storage.googleapis.com/'.config('filesystems.disks.gcs.bucket').'/'.$filename;
        }

        $this->repository->create($data);
    }
}
