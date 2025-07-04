<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MilestoneBannerRequest;
use App\Modules\Admin\MilestoneBanner\Action\CreateOrUpdate;
use App\Repositories\Interface\MilestoneBannerRepositoryInterface;

class MilestoneBannerController extends Controller
{
    public function create(MilestoneBannerRepositoryInterface $repository)
    {
        $banner = $repository->get();
        return view('admin.milestone_banner.create_or_update', compact('banner'));
    }

    public function storeOrUpdate(
        MilestoneBannerRequest $request,
        CreateOrUpdate $action
    ) {
        $action->execute($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Milestone Banner saved successfully.');
    }
}
