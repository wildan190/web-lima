<?php

namespace App\Repositories;

use App\Models\UniversityCoverage;
use App\Repositories\Interface\UniversityCoverageRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class UniversityCoverageRepository implements UniversityCoverageRepositoryInterface
{
    public function getAll()
    {
        return UniversityCoverage::latest()->get();
    }

    public function findById($id)
    {
        return UniversityCoverage::findOrFail($id);
    }

    public function create(array $data)
    {
        return UniversityCoverage::create($data);
    }

    public function update($id, array $data)
    {
        $coverage = $this->findById($id);
        $coverage->update($data);
        return $coverage;
    }

    public function delete($id)
    {
        $coverage = $this->findById($id);

        if ($coverage->logo && Storage::disk('public')->exists($coverage->logo)) {
            Storage::disk('public')->delete($coverage->logo);
        }

        return $coverage->delete();
    }
}
