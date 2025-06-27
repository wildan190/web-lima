<?php

namespace App\Modules\Admin\WebContact\Action;

use App\Repositories\Interface\WebContactRepositoryInterface;

class GetWebContact
{
    public function __construct(protected WebContactRepositoryInterface $repository) {}

    public function handle()
    {
        return $this->repository->getWebContact();
    }
}
