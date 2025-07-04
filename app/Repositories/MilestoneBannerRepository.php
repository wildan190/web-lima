<?php

namespace App\Repositories;

use App\Models\MilestioneBanner;
use App\Repositories\Interface\MilestoneBannerRepositoryInterface;

class MilestoneBannerRepository implements MilestoneBannerRepositoryInterface
{
    public function get()
    {
        return MilestioneBanner::first();
    }

    public function updateOrCreate(array $condition, array $data)
    {
        return MilestioneBanner::updateOrCreate($condition, $data);
    }
}
