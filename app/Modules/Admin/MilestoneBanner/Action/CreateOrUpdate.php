<?php

namespace App\Modules\Admin\MilestoneBanner\Action;

use App\Repositories\Interface\MilestoneBannerRepositoryInterface;

class CreateOrUpdate
{
    public function __construct(protected MilestoneBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture'])) {
            $data['upload_picture'] = $data['upload_picture']->store('milestone_banner', 'public');
        }

        $this->repository->updateOrCreate([], $data);
    }
}
