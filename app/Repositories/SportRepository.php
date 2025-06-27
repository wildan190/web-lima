<?php

namespace App\Repositories;

use App\Models\Sport;
use App\Repositories\Interface\SportRepositoryInterface;

class SportRepository implements SportRepositoryInterface
{
    public function all()
    {
        return Sport::latest()->get();
    }

    public function find($id)
    {
        return Sport::findOrFail($id);
    }

    public function create(array $data)
    {
        return Sport::create($data);
    }

    public function update($id, array $data)
    {
        $sport = Sport::findOrFail($id);
        $sport->update($data);

        return $sport;
    }

    public function delete($id)
    {
        $sport = Sport::findOrFail($id);
        $sport->delete();
    }
}
