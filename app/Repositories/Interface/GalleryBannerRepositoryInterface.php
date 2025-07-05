<?php

namespace App\Repositories\Interface;

interface GalleryBannerRepositoryInterface
{
    public function get();

    public function updateOrCreate(array $condition, array $data);
}
