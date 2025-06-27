<?php

namespace App\Modules\Admin\Gallery\Action;

use App\Models\Gallery;

class CreateGallery
{
    public function execute(array $data)
    {
        if (isset($data['picture_upload'])) {
            $data['picture_upload'] = $data['picture_upload']->store('galleries', 'public');
        }

        Gallery::create($data);
    }
}
