<?php

namespace App\Modules\Admin\ContactBanner\Action;

use App\Repositories\Interface\ContactBannerRepositoryInterface;

class CreateOrUpdate
{
    public function __construct(protected ContactBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture'])) {
            $data['upload_picture'] = $data['upload_picture']->store('about_banner', 'public');
        }

        $this->repository->updateOrCreate($data);
    }
}
