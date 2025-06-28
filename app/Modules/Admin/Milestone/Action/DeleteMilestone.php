<?php

namespace App\Modules\Admin\Milestone\Action;

use App\Repositories\Interface\MilestoneRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class DeleteMilestone
{
    public function __construct(protected MilestoneRepositoryInterface $repo) {}

    public function execute(int $id): void
    {
        $item = $this->repo->findById($id);

        if ($item->picture_upload && Storage::disk('public')->exists($item->picture_upload)) {
            Storage::disk('public')->delete($item->picture_upload);
        }

        $this->repo->delete($id);
    }
}
