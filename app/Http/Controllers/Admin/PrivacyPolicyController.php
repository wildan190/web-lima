<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrivacyPolicyRequest;
use App\Modules\Admin\PrivacyPolicy\Action\CreateOrUpdatePrivacyPolicy;
use App\Repositories\Interface\PrivacyPolicyInterface;

class PrivacyPolicyController extends Controller
{
    protected $privacyPolicyRepo;

    public function __construct(PrivacyPolicyInterface $privacyPolicyRepo)
    {
        $this->privacyPolicyRepo = $privacyPolicyRepo;
    }

    public function edit()
    {
        $privacyPolicy = $this->privacyPolicyRepo->getLatest();
        return view('admin.privacy_policies.update', compact('privacyPolicy'));
    }

    public function update(PrivacyPolicyRequest $request, CreateOrUpdatePrivacyPolicy $action)
    {
        $action->execute($request->validated());

        return redirect()->route('admin.privacy-policies.edit')->with('success', 'Privacy Policy updated successfully.');
    }
}
