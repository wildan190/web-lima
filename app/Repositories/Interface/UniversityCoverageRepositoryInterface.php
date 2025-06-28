<?php

namespace App\Repositories\Interface;

interface UniversityCoverageRepositoryInterface
{
    public function getAll();

    public function findById($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
