<?php

namespace App\Modules\Admin\News\Action;

use App\Repositories\Interface\NewsRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class DeleteNews
{
    public function __construct(protected NewsRepositoryInterface $repository) {}

    public function execute($id)
    {
        $item = $this->repository->findById($id);

        if ($item && $item->picture_upload) {
            $urlPath = parse_url($item->picture_upload, PHP_URL_PATH);
            if ($urlPath && str_contains($urlPath, '/storage/')) {
                $relativePath = ltrim(str_replace('/storage/', '', $urlPath), '/');
                Storage::disk('public')->delete($relativePath);
            }
        }

        $this->repository->delete($id);
    }
}
