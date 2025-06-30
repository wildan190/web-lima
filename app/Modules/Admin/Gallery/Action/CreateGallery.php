<?php

namespace App\Modules\Admin\UniversityCoverage\Action;

use App\Repositories\Interface\UniversityCoverageRepositoryInterface;

class CreateUniversityCoverage
{
    protected UniversityCoverageRepositoryInterface $repository;

    public function __construct(UniversityCoverageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data): void
    {
        if (isset($data['logo']) && $data['logo']->isValid()) {
            $data['logo'] = $data['logo']->store('university_coverages', 'public');
        }

        $this->repository->create($data);
    }
}
