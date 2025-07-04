<?php

namespace App\Repositories;

use App\Models\AboutBanner;
use App\Repositories\Interface\AboutBannerRepositoryInterface;

class AboutBannerRepository implements AboutBannerRepositoryInterface
{
    public function create(array $data)
    {
        return AboutBanner::create($data);
    }

    public function update(int $id, array $data)
    {
        $banner = AboutBanner::findOrFail($id);

        return $banner->update($data);
    }

    public function first()
    {
        return AboutBanner::first();
    }
}
