<?php

namespace App\Modules\Admin\UniversityCoverage\Action;

use App\Repositories\Interface\UniversityCoverageRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class UpdateUniversityCoverage
{
    protected $repository;

    public function __construct(UniversityCoverageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, array $data): void
    {
        $item = $this->repository->findById($id);

        if (isset($data['logo']) && $data['logo']->isValid()) {
            if ($item->logo && Storage::disk('public')->exists($item->logo)) {
                Storage::disk('public')->delete($item->logo);
            }

            $data['logo'] = $data['logo']->store('university_coverages', 'public');
        } else {
            unset($data['logo']);
        }

        $this->repository->update($id, $data);
    }
}
