<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebContactRequest;
use App\Modules\Admin\WebContact\Action\GetWebContact;
use App\Modules\Admin\WebContact\Action\CreateOrUpdateWebContact;

class WebContactController extends Controller
{
    public function index(GetWebContact $getter)
    {
        $contact = $getter->handle();
        return view('admin.web_contact.create_or_update', compact('contact'));
    }

    public function store(WebContactRequest $request, CreateOrUpdateWebContact $action)
    {
        $action->handle($request->validated());
        return redirect()->back()->with('success', 'Web contact updated successfully.');
    }
}