<?php

namespace App\Repositories;

use App\Models\GalleryBanner;
use App\Repositories\Interface\GalleryBannerRepositoryInterface;

class GalleryBannerRepository implements GalleryBannerRepositoryInterface
{
    public function get()
    {
        return GalleryBanner::first();
    }

    public function updateOrCreate(array $condition, array $data)
    {
        return GalleryBanner::updateOrCreate($condition, $data);
    }
}
