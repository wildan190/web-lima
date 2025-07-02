<?php

namespace App\Repositories\Interface;

interface AboutBannerRepositoryInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function first();
}
