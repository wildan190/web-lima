<?php

namespace App\Modules\Admin\Sport\Action;

class DeleteSport
{
    public function __construct(protected \App\Repositories\Interface\SportRepositoryInterface $repo) {}

    public function handle($id)
    {
        $this->repo->delete($id);
    }
}
