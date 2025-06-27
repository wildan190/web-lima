<?php

namespace App\Repositories\Interface;

interface WebProfileRepositoryInterface
{
    public function getWebProfile();

    public function createOrUpdate(array $data);
}
