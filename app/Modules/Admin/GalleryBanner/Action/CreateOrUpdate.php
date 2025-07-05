<?php

namespace App\Modules\Admin\GalleryBanner\Action;

use App\Repositories\Interface\GalleryBannerRepositoryInterface;

class CreateOrUpdate
{
    public function __construct(protected GalleryBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture'])) {
            $data['upload_picture'] = $data['upload_picture']->store('gallery_banner', 'public');
        }

        $this->repository->updateOrCreate([], $data);
    }
}
