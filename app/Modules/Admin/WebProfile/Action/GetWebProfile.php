<?php

namespace App\Modules\Admin\WebProfile\Action;

use App\Repositories\Interface\WebProfileRepositoryInterface;

class GetWebProfile
{
    public function __construct(protected WebProfileRepositoryInterface $repository) {}

    public function handle()
    {
        return $this->repository->getWebProfile();
    }
}
