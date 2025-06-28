<?php

namespace App\Modules\Admin\Milestone\Action;

use App\Repositories\Interface\MilestoneRepositoryInterface;

class CreateMilestone
{
    public function __construct(protected MilestoneRepositoryInterface $repo) {}

    public function execute(array $data): void
    {
        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $data['picture_upload'] = $data['picture_upload']->store('milestones', 'public');
        }

        $this->repo->create($data);
    }
}
