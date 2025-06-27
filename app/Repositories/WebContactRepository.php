<?php

namespace App\Repositories;

use App\Models\WebContact;
use App\Repositories\Interface\WebContactRepositoryInterface;

class WebContactRepository implements WebContactRepositoryInterface
{
    public function getWebContact()
    {
        return WebContact::first();
    }

    public function createOrUpdate(array $data)
    {
        return WebContact::updateOrCreate(['id' => 1], $data);
    }
}
