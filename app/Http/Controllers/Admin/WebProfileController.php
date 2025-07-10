<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebProfileRequest;
use App\Modules\Admin\WebProfile\Action\CreateOrUpdateWebProfile;
use App\Modules\Admin\WebProfile\Action\GetWebProfile;
use Google\Cloud\Storage\StorageClient;

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

            $storage = new StorageClient([
                'projectId' => config('filesystems.disks.gcs.project_id'),
                'keyFilePath' => config('filesystems.disks.gcs.key_file'),
            ]);

            $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

            $bucket->upload(file_get_contents($file->getRealPath()), ['name' => $filename]);

            $data['logo'] = 'https://storage.googleapis.com/'.config('filesystems.disks.gcs.bucket').'/'.$filename;
        }

        $action->handle($data);

        return redirect()->back()->with('success', 'Web profile updated successfully.');
    }
}
