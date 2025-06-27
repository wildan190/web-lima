<?php

namespace App\Modules\Admin\Sport\Action;

use App\Http\Requests\SportRequest;

class UpdateSport
{
    public function __construct(protected \App\Repositories\Interface\SportRepositoryInterface $repo) {}

    public function handle(SportRequest $request, $id)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('sports', 'public');
        }

        $this->repo->update($id, $data);
    }
}
