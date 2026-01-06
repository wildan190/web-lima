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

        if ($item->picture_upload) {
            $urlPath = parse_url($item->picture_upload, PHP_URL_PATH);
            if ($urlPath && str_contains($urlPath, '/storage/')) {
                $relativePath = ltrim(str_replace('/storage/', '', $urlPath), '/');
                Storage::disk('public')->delete($relativePath);
            }
        }

        $this->repo->delete($id);
    }
}
