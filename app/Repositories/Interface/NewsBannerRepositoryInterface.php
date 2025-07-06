<?php

namespace App\Repositories\Interface;

interface NewsBannerRepositoryInterface
{
    public function get();

    public function updateOrCreate(array $condition, array $data);
}
