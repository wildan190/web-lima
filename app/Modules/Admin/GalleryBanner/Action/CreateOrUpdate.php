<?php

namespace App\Modules\Admin\GalleryBanner\Action;

use App\Repositories\Interface\GalleryBannerRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CreateOrUpdate
{
    public function __construct(protected GalleryBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture']) && $data['upload_picture']->isValid()) {
            $file = $data['upload_picture'];
            $filename = 'gallery_banner/gallery_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['upload_picture'] = Storage::url($filename);
        }

        // Simpan data ke repository
        $this->repository->updateOrCreate([], $data);
    }
}
