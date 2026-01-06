<?php

namespace App\Modules\Admin\MilestoneBanner\Action;

use App\Repositories\Interface\MilestoneBannerRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CreateOrUpdate
{
    public function __construct(protected MilestoneBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture']) && $data['upload_picture']->isValid()) {
            $file = $data['upload_picture'];
            $filename = 'milestone_banner/milestone_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['upload_picture'] = Storage::url($filename);
        }

        $this->repository->updateOrCreate([], $data);
    }
}
