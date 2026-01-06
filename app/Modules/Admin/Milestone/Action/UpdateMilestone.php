<?php

namespace App\Modules\Admin\Milestone\Action;

use App\Repositories\Interface\MilestoneRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class UpdateMilestone
{
    public function __construct(protected MilestoneRepositoryInterface $repo) {}

    public function execute(int $id, array $data): void
    {
        $item = $this->repo->findById($id);

        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $file = $data['picture_upload'];
            $filename = 'milestones/milestone_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['picture_upload'] = Storage::url($filename);
        } else {
            unset($data['picture_upload']);
        }

        $this->repo->update($id, $data);
    }
}
