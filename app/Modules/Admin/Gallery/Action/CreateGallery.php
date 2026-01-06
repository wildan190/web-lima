<?php

namespace App\Modules\Admin\Gallery\Action;

use App\Repositories\Interface\GalleryRepositoryInterface;
use Illuminate\Support\Facades\Storage;

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
            $file = $data['picture_upload'];
            $filename = 'galleries/gallery_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['picture_upload'] = Storage::url($filename);
        }

        $this->repository->create($data);
    }
}
