<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutBannerRequest;
use App\Modules\Admin\AboutBanner\Action\CreateOrUpdate;
use App\Repositories\Interface\AboutBannerRepositoryInterface;

class AboutBannerController extends Controller
{
    public function create(AboutBannerRepositoryInterface $repository)
    {
        $banner = $repository->first(); // Ambil banner pertama

        return view('admin.about_banner.create_or_update', compact('banner'));
    }

    public function storeOrUpdate(
        AboutBannerRequest $request,
        CreateOrUpdate $action
    ) {
        $action->execute($request->validated());

        return redirect()->back()->with('success', 'About Banner saved successfully.');
    }
}
