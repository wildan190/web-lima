<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SportRequest;
use App\Modules\Admin\Sport\Action\CreateSport;
use App\Modules\Admin\Sport\Action\DeleteSport;
use App\Modules\Admin\Sport\Action\GetSport;
use App\Modules\Admin\Sport\Action\UpdateSport;

class SportController extends Controller
{
    public function index(GetSport $action)
    {
        $sports = $action->handle();

        return view('admin.sports.index', compact('sports'));
    }

    public function create()
    {
        return view('admin.sports.create');
    }

    public function store(SportRequest $request, CreateSport $action)
    {
        $action->handle($request);

        return redirect()->route('admin.sports.index')->with('success', 'Sport created successfully.');
    }

    public function edit($id, GetSport $action)
    {
        $sport = $action->findById($id);

        return view('admin.sports.edit', compact('sport'));
    }

    public function update(SportRequest $request, $id, UpdateSport $action)
    {
        $action->handle($request, $id);

        return redirect()->route('admin.sports.index')->with('success', 'Sport updated successfully.');
    }

    public function destroy($id, DeleteSport $action)
    {
        $action->handle($id);

        return redirect()->route('admin.sports.index')->with('success', 'Sport deleted successfully.');
    }
}
