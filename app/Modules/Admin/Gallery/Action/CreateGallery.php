<?php

namespace App\Modules\Admin\Gallery\Action;

use App\Repositories\Interface\GalleryRepositoryInterface;
use App\Repositories\Interface\UniversityCoverageRepositoryInterface;

class CreateGallery
{
    protected GalleryRepositoryInterface $repository;

    public function __construct(GalleryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data): void
    {
        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $data['picture_upload'] = $data['picture_upload']->store('galleries', 'public');
        }

        $this->repository->create($data);
    }
}
