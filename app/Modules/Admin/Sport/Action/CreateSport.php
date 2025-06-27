<?php

namespace App\Modules\Admin\Sport\Action;

use App\Http\Requests\SportRequest;

class CreateSport
{
    public function __construct(protected \App\Repositories\Interface\SportRepositoryInterface $repo) {}

    public function handle(SportRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('sports', 'public');
        }

        $this->repo->create($data);
    }
}
