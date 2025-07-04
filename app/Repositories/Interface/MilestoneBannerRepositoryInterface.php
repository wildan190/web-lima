<?php

namespace App\Repositories\Interface;

interface MilestoneBannerRepositoryInterface
{
    public function get();
    public function updateOrCreate(array $condition, array $data);
}
