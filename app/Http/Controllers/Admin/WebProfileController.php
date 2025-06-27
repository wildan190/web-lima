<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebProfileRequest;
use App\Modules\Admin\WebProfile\Action\CreateOrUpdateWebProfile;
use App\Modules\Admin\WebProfile\Action\GetWebprofile;

class WebProfileController extends Controller
{
    public function index(GetWebprofile $getter)
    {
        $profile = $getter->handle();

        return view('admin.web_profile.create_or_update', compact('profile'));
    }

    public function store(WebProfileRequest $request, CreateOrUpdateWebProfile $action)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('web_logo', 'public');
            $data['logo'] = $logoPath;
        }

        $action->handle($data);

        return redirect()->back()->with('success', 'Web profile updated successfully.');
    }
}
