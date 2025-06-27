<?php

namespace App\Modules\Admin\UniversityCoverage\Action;

use App\Repositories\Interface\UniversityCoverageRepositoryInterface;

class DeleteUniversityCoverage
{
    public function __construct(protected UniversityCoverageRepositoryInterface $repo) {}

    public function handle($id)
    {
        return $this->repo->delete($id);
    }
}
