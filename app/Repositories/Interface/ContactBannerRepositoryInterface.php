<?php

namespace App\Repositories\Interface;

interface ContactBannerRepositoryInterface
{
    public function getFirst();
    public function updateOrCreate(array $data);
}
