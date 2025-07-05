<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryBannerRequest;
use App\Modules\Admin\GalleryBanner\Action\CreateOrUpdate;
use App\Repositories\Interface\GalleryBannerRepositoryInterface;

class GalleryBannerController extends Controller
{
    public function create(GalleryBannerRepositoryInterface $repository)
    {
        $galleryBanner = $repository->get();

        return view('admin.gallery_banner.create_or_update', compact('galleryBanner'));
    }

    public function storeOrUpdate(
        GalleryBannerRequest $request,
        CreateOrUpdate $action
    ) {
        $action->execute($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Gallery Banner saved successfully.');
    }
}
