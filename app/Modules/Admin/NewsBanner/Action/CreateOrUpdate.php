<?php

namespace App\Modules\Admin\NewsBanner\Action;

use App\Repositories\Interface\NewsBannerRepositoryInterface;

class CreateOrUpdate
{
    public function __construct(protected NewsBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture'])) {
            $data['upload_picture'] = $data['upload_picture']->store('news_banner', 'public');
        }

        $this->repository->updateOrCreate([], $data);
    }
}
