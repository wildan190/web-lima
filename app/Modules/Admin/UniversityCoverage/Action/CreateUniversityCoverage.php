<?php

namespace App\Modules\Admin\UniversityCoverage\Action;

use App\Repositories\Interface\UniversityCoverageRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class CreateUniversityCoverage
{
    protected $repository;

    public function __construct(UniversityCoverageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data): void
    {
        if (isset($data['logo']) && $data['logo']->isValid()) {
            $file = $data['logo'];
            $filename = 'university_coverages/logo_'.time().'.'.$file->getClientOriginalExtension();

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            $bucket->upload(
                file_get_contents($file->getRealPath()), [
                    'name' => $filename,
                ]
            );

            $data['logo'] = 'https://storage.googleapis.com/'.config('filesystems.disks.gcs.bucket').'/'.$filename;
        }

        $this->repository->create($data);
    }
}
