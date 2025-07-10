<?php

namespace App\Repositories\Interface;

interface ContactBannerRepositoryInterface
{
    public function first();

    public function update(int $id, array $data);

    public function create(array $data);
}
