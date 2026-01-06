<?php

namespace App\Modules\Admin\Milestone\Action;

use App\Repositories\Interface\MilestoneRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CreateMilestone
{
    public function __construct(protected MilestoneRepositoryInterface $repo) {}

    public function execute(array $data): void
    {
        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $file = $data['picture_upload'];
            $filename = 'milestones/milestone_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['picture_upload'] = Storage::url($filename);
        }

        $this->repo->create($data);
    }
}
