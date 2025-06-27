<?php

namespace App\Modules\Admin\Sport\Action;

use App\Repositories\Interface\SportRepositoryInterface;

class GetSport
{
    public function __construct(protected SportRepositoryInterface $repo) {}

    public function handle()
    {
        return $this->repo->all();
    }

    public function findById($id)
    {
        return $this->repo->find($id);
    }
}
