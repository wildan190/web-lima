<?php

namespace App\Repositories;

use App\Models\Gallery;
use App\Repositories\Interface\GalleryRepositoryInterface;

class GalleryRepository implements GalleryRepositoryInterface
{
    public function all()
    {
        return Gallery::all();
    }

    public function find($id)
    {
        return Gallery::findOrFail($id);
    }

    public function create(array $data)
    {
        return Gallery::create($data);
    }

    public function update($id, array $data)
    {
        $gallery = $this->find($id);

        return $gallery->update($data);
    }

    public function delete($id)
    {
        $gallery = $this->find($id);

        return $gallery->delete();
    }
}
