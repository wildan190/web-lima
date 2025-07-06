<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsBannerRequest;
use App\Modules\Admin\NewsBanner\Action\CreateOrUpdate;
use App\Repositories\Interface\NewsBannerRepositoryInterface;

class NewsBannerController extends Controller
{
    public function create(NewsBannerRepositoryInterface $repository)
    {
        $newsBanner = $repository->get();

        return view('admin.news_banner.create_or_update', compact('newsBanner'));
    }

    public function storeOrUpdate(
        NewsBannerRequest $request,
        CreateOrUpdate $action
    ) {
        $action->execute($request->validated());

        return redirect()
            ->back()
            ->with('success', 'News Banner saved successfully.');
    }
}
