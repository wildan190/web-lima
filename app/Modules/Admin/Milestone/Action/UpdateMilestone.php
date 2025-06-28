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
            if ($item->picture_upload && Storage::disk('public')->exists($item->picture_upload)) {
                Storage::disk('public')->delete($item->picture_upload);
            }
            $data['picture_upload'] = $data['picture_upload']->store('milestones', 'public');
        } else {
            unset($data['picture_upload']);
        }

        $this->repo->update($id, $data);
    }
}
