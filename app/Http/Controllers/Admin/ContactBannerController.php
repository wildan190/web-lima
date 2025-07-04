<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactBannerRequest;
use App\Modules\Admin\ContactBanner\Action\CreateOrUpdate;
use App\Repositories\Interface\ContactBannerRepositoryInterface;

class ContactBannerController extends Controller
{
    public function __construct(protected ContactBannerRepositoryInterface $repository) {}

    public function form()
    {
        $banner = $this->repository->getFirst();

        return view('admin.contact_banner.create_or_update', compact('banner'));
    }

    public function storeOrUpdate(ContactBannerRequest $request, CreateOrUpdate $action)
    {
        $action->execute($request->validated());

        return redirect()
            ->route('admin.contact_banner.form')
            ->with('success', 'Contact Banner updated successfully.');
    }
}
