<?php

namespace App\Repositories\Interface;

interface PrivacyPolicyInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function getLatest();
}
