<?php

namespace App\Modules\Admin\News\Action;

use App\Repositories\Interface\NewsRepositoryInterface;

class DeleteNews
{
    public function __construct(protected NewsRepositoryInterface $repository) {}

    public function execute($id)
    {
        $this->repository->delete($id);
    }
}
