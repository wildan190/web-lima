<?php

namespace App\Modules\Admin\AboutBanner\Action;

use App\Repositories\Interface\AboutBannerRepositoryInterface;

class CreateOrUpdate
{
    public function __construct(protected AboutBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture'])) {
            $data['upload_picture'] = $data['upload_picture']->store('about_banner', 'public');
        }

        $existing = $this->repository->first();
        if ($existing) {
            $this->repository->update($existing->id, $data);
        } else {
            $this->repository->create($data);
        }
    }
}
