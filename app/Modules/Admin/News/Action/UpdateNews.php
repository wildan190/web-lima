<?php

namespace App\Modules\Admin\News\Action;

use App\Repositories\Interface\NewsRepositoryInterface;

class UpdateNews
{
    public function __construct(protected NewsRepositoryInterface $repository) {}

    public function execute($id, array $data)
    {
        if (isset($data['picture_upload'])) {
            $data['picture_upload'] = $data['picture_upload']->store('news', 'public');
        }

        $this->repository->update($id, $data);
    }
}
