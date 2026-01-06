<?php

namespace App\Modules\Admin\Sport\Action;

use App\Http\Requests\SportRequest;
use App\Repositories\Interface\SportRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class UpdateSport
{
    public function __construct(protected SportRepositoryInterface $repo) {}

    public function handle(SportRequest $request, $id): void
    {
        $data = $request->validated();
        $item = $this->repo->find($id);

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            if ($item->logo) {
                $urlPath = parse_url($item->logo, PHP_URL_PATH);
                if ($urlPath && str_contains($urlPath, '/storage/')) {
                    $relativePath = ltrim(str_replace('/storage/', '', $urlPath), '/');
                    Storage::disk('public')->delete($relativePath);
                }
            }

            // Upload new file
            $file = $request->file('logo');
            $filename = 'sports/sport_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));

            $data['logo'] = Storage::url($filename);
        } else {
            unset($data['logo']); // Avoid null overwrite
        }

        $this->repo->update($id, $data);
    }
}
