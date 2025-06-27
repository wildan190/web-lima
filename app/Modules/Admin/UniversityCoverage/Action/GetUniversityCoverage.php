<?php

namespace App\Modules\Admin\UniversityCoverage\Action;

use App\Repositories\Interface\UniversityCoverageRepositoryInterface;

class GetUniversityCoverage
{
    public function __construct(protected UniversityCoverageRepositoryInterface $repo) {}

    public function handle()
    {
        return $this->repo->getAll();
    }

    public function find($id)
    {
        return $this->repo->findById($id);
    }
}
