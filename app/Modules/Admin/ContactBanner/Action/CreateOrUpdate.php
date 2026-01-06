<?php

namespace App\Modules\Admin\ContactBanner\Action;

use App\Repositories\Interface\ContactBannerRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CreateOrUpdate
{
    public function __construct(protected ContactBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture']) && $data['upload_picture']->isValid()) {
            $file = $data['upload_picture'];
            $filename = 'contact_banner/contact_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['upload_picture'] = Storage::url($filename);
        }

        $existing = $this->repository->first();
        if ($existing) {
            $this->repository->update($existing->id, $data);
        } else {
            $this->repository->create($data);
        }
    }
}
