<?php

namespace App\Repositories;

use App\Models\WebProfile;
use App\Repositories\Interface\WebProfileRepositoryInterface;

class WebProfileRepository implements WebProfileRepositoryInterface
{
    public function getWebProfile()
    {
        return WebProfile::first();
    }

    public function createOrUpdate(array $data)
    {
        return WebProfile::updateOrCreate(['id' => 1], $data);
    }
}
