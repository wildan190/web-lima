<?php

namespace App\Modules\Admin\Sport\Action;

use App\Http\Requests\SportRequest;
use App\Repositories\Interface\SportRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class CreateSport
{
    public function __construct(protected SportRepositoryInterface $repo) {}

    public function handle(SportRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $file = $request->file('logo');
            $filename = 'sports/sport_'.time().'.'.$file->getClientOriginalExtension();

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            $bucket->upload(
                file_get_contents($file->getRealPath()),
                ['name' => $filename]
            );

            $data['logo'] = 'https://storage.googleapis.com/'.config('filesystems.disks.gcs.bucket').'/'.$filename;
        }

        $this->repo->create($data);
    }
}
