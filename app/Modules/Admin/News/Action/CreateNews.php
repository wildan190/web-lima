<?php

namespace App\Modules\Admin\News\Action;

use App\Repositories\Interface\NewsRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CreateNews
{
    public function __construct(protected NewsRepositoryInterface $repository) {}

    public function execute(array $data): void
    {
        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $file = $data['picture_upload'];
            $filename = 'news/news_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['picture_upload'] = Storage::url($filename);
        }

        $this->repository->create($data);
    }
}
