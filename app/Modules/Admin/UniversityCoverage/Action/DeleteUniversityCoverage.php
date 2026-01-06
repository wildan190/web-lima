<?php

namespace App\Modules\Admin\UniversityCoverage\Action;

use App\Repositories\Interface\UniversityCoverageRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class DeleteUniversityCoverage
{
    public function __construct(protected UniversityCoverageRepositoryInterface $repo) {}

    public function handle($id)
    {
        $item = $this->repo->findById($id);

        if ($item && $item->logo) {
            $urlPath = parse_url($item->logo, PHP_URL_PATH);
            if ($urlPath && str_contains($urlPath, '/storage/')) {
                $relativePath = ltrim(str_replace('/storage/', '', $urlPath), '/');
                Storage::disk('public')->delete($relativePath);
            }
        }

        return $this->repo->delete($id);
    }
}
