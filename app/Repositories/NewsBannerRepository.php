<?php

namespace App\Repositories;

use App\Models\NewsBanner;
use App\Repositories\Interface\NewsBannerRepositoryInterface;

class NewsBannerRepository implements NewsBannerRepositoryInterface
{
    public function get()
    {
        return NewsBanner::first();
    }

    public function updateOrCreate(array $condition, array $data)
    {
        return NewsBanner::updateOrCreate($condition, $data);
    }
}
