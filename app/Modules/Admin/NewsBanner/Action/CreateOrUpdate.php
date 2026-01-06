<?php

namespace App\Modules\Admin\NewsBanner\Action;

use App\Repositories\Interface\NewsBannerRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CreateOrUpdate
{
    public function __construct(protected NewsBannerRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['upload_picture']) && $data['upload_picture']->isValid()) {
            $file = $data['upload_picture'];
            $filename = 'news_banner/news_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['upload_picture'] = Storage::url($filename);
        }

        $this->repository->updateOrCreate([], $data);
    }
}
