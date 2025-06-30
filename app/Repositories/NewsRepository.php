<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\Interface\NewsRepositoryInterface;

class NewsRepository implements NewsRepositoryInterface
{
    public function all()
    {
        return News::latest()->get();
    }

    public function findById($id)
    {
        return News::findOrFail($id);
    }

    public function create(array $data)
    {
        return News::create($data);
    }

    public function update($id, array $data)
    {
        $news = News::findOrFail($id);
        $news->update($data);
    }

    public function delete($id)
    {
        News::destroy($id);
    }
}
