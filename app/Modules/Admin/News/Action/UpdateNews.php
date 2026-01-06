<?php

namespace App\Modules\Admin\News\Action;

use App\Repositories\Interface\NewsRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class UpdateNews
{
    public function __construct(protected NewsRepositoryInterface $repository) {}

    public function execute($id, array $data)
    {
        $item = $this->repository->findById($id);

        if (isset($data['picture_upload']) && $data['picture_upload']->isValid()) {
            $file = $data['picture_upload'];
            $filename = 'news/news_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['picture_upload'] = Storage::url($filename);
        } else {
            unset($data['picture_upload']);
        }

        $this->repository->update($id, $data);
    }
}
