<?php

namespace App\Repositories;

use App\Models\Milestone;
use App\Repositories\Interface\MilestoneRepositoryInterface;

class MilestoneRepository implements MilestoneRepositoryInterface
{
    public function getAll()
    {
        return Milestone::with('sport')->latest()->get();
    }

    public function findById($id)
    {
        return Milestone::with('sport')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Milestone::create($data);
    }

    public function update($id, array $data)
    {
        $item = $this->findById($id);
        $item->update($data);

        return $item;
    }

    public function delete($id)
    {
        return Milestone::destroy($id);
    }
}
