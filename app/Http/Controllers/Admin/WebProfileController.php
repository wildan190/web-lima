<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebProfileRequest;
use App\Modules\Admin\WebProfile\Action\CreateOrUpdateWebProfile;
use App\Modules\Admin\WebProfile\Action\GetWebProfile;
use Illuminate\Support\Facades\Storage;

class WebProfileController extends Controller
{
    public function index(GetWebProfile $getter)
    {
        $profile = $getter->handle();

        return view('admin.web_profile.create_or_update', compact('profile'));
    }

    public function store(WebProfileRequest $request, CreateOrUpdateWebProfile $action)
    {
        $data = $request->validated();

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $file = $request->file('logo');
            $filename = 'web_logo/logo_'.time().'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
            $data['logo'] = Storage::url($filename);
        }

        $action->handle($data);

        return redirect()->back()->with('success', 'Web profile updated successfully.');
    }
}
