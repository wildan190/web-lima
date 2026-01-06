<?php

namespace App\Modules\Admin\Sport\Action;

use App\Http\Requests\SportRequest;
use App\Repositories\Interface\SportRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CreateSport
{
    public function __construct(protected SportRepositoryInterface $repo) {}

    public function handle(SportRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $file = $request->file('logo');
            $filename = 'sports/sport_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['logo'] = Storage::url($filename);
        }

        $this->repo->create($data);
    }
}
