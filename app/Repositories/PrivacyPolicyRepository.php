<?php

namespace App\Repositories;

use App\Models\PrivacyPolicy;
use App\Repositories\Interface\PrivacyPolicyInterface;

class PrivacyPolicyRepository implements PrivacyPolicyInterface
{
    public function create(array $data)
    {
        return PrivacyPolicy::create($data);
    }

    public function update(int $id, array $data)
    {
        return PrivacyPolicy::where('id', $id)->update($data);
    }

    public function getLatest()
    {
        return PrivacyPolicy::latest()->first();
    }
}
