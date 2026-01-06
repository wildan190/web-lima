<?php

namespace App\Modules\Admin\UniversityCoverage\Action;

use App\Repositories\Interface\UniversityCoverageRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CreateUniversityCoverage
{
    protected $repository;

    public function __construct(UniversityCoverageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data): void
    {
        if (isset($data['logo']) && $data['logo']->isValid()) {
            $file = $data['logo'];
            $filename = 'university_coverages/logo_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['logo'] = Storage::url($filename);
        }

        $this->repository->create($data);
    }
}
