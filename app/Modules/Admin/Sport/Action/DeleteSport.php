<?php

namespace App\Modules\Admin\Sport\Action;

use App\Repositories\Interface\SportRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class DeleteSport
{
    public function __construct(protected SportRepositoryInterface $repo) {}

    public function handle($id): void
    {
        $item = $this->repo->find($id);

        if ($item->logo) {
            $urlPath = parse_url($item->logo, PHP_URL_PATH);
            if ($urlPath && str_contains($urlPath, '/storage/')) {
                $relativePath = ltrim(str_replace('/storage/', '', $urlPath), '/');
                Storage::disk('public')->delete($relativePath);
            }
        }

        $this->repo->delete($id);
    }
}
