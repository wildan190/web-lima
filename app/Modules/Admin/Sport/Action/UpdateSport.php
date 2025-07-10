<?php

namespace App\Modules\Admin\Sport\Action;

use App\Http\Requests\SportRequest;
use App\Repositories\Interface\SportRepositoryInterface;
use Google\Cloud\Storage\StorageClient;

class UpdateSport
{
    public function __construct(protected SportRepositoryInterface $repo) {}

    public function handle(SportRequest $request, $id): void
    {
        $data = $request->validated();
        $item = $this->repo->find($id);

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            // Delete old logo if exists and it's from GCS
            if ($item->logo && str_starts_with($item->logo, 'https://storage.googleapis.com/')) {
                $parsed = parse_url($item->logo);
                $path = ltrim($parsed['path'], '/');

                $storage = new StorageClient([
                    'projectId' => config('filesystems.disks.gcs.project_id'),
                    'keyFilePath' => config('filesystems.disks.gcs.key_file'),
                ]);
                $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

                $object = $bucket->object($path);
                if ($object->exists()) {
                    $object->delete();
                }
            }

            // Upload new file
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
        } else {
            unset($data['logo']); // Avoid null overwrite
        }

        $this->repo->update($id, $data);
    }
}
