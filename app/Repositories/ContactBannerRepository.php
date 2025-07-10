<?php

namespace App\Repositories;

use App\Models\ContactBanner;
use App\Repositories\Interface\ContactBannerRepositoryInterface;

class ContactBannerRepository implements ContactBannerRepositoryInterface
{
    public function first()
    {
        return ContactBanner::first();
    }

    public function update(int $id, array $data)
    {
        return ContactBanner::where('id', $id)->update($data);
    }

    public function create(array $data)
    {
        return ContactBanner::create($data);
    }
}
