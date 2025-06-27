<?php

namespace App\Modules\Admin\WebContact\Action;

use App\Repositories\Interface\WebContactRepositoryInterface;

class CreateOrUpdateWebContact
{
    public function __construct(protected WebContactRepositoryInterface $repository) {}

    public function handle(array $data)
    {
        return $this->repository->createOrUpdate($data);
    }
}
