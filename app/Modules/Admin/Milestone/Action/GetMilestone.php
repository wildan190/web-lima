<?php

namespace App\Modules\Admin\Milestone\Action;

use App\Repositories\Interface\MilestoneRepositoryInterface;

class GetMilestone
{
    public function __construct(protected MilestoneRepositoryInterface $repo) {}

    public function handle()
    {
        return $this->repo->getAll();
    }

    public function find($id)
    {
        return $this->repo->findById($id);
    }
}
