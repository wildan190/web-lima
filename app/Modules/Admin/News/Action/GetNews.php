<?php

namespace App\Modules\Admin\News\Action;

use App\Repositories\Interface\NewsRepositoryInterface;

class GetNews
{
    public function __construct(protected NewsRepositoryInterface $repository) {}

    public function execute()
    {
        return $this->repository->all();
    }

    public function find($id)
    {
        return $this->repository->findById($id);
    }
}
