<?php

namespace App\Modules\Admin\WebProfile\Action;

use App\Repositories\Interface\WebProfileRepositoryInterface;

class CreateOrUpdateWebProfile
{
    public function __construct(protected WebProfileRepositoryInterface $repository) {}

    public function handle(array $data)
    {
        return $this->repository->createOrUpdate($data);
    }
}
