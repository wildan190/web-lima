<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MilestoneRequest;
use App\Models\Sport;
use App\Modules\Admin\Milestone\Action\CreateMilestone;
use App\Modules\Admin\Milestone\Action\DeleteMilestone;
use App\Modules\Admin\Milestone\Action\GetMilestone;
use App\Modules\Admin\Milestone\Action\UpdateMilestone;

class MilestoneController extends Controller
{
    protected $actionGet;

    public function __construct(
        GetMilestone $actionGet
    ) {
        $this->actionGet = $actionGet;
    }

    public function index()
    {
        $milestones = $this->actionGet->handle();

        return view('admin.milestones.index', compact('milestones'));
    }

    public function create()
    {
        $sports = Sport::all();

        return view('admin.milestones.create', compact('sports'));
    }

    public function store(MilestoneRequest $request, CreateMilestone $action)
    {
        $action->execute($request->validated());

        return redirect()->route('admin.milestones.index')->with('success', 'Milestone created.');
    }

    public function edit($id)
    {
        $milestone = $this->actionGet->find($id);
        $sports = Sport::all();

        return view('admin.milestones.edit', compact('milestone', 'sports'));
    }

    public function update(MilestoneRequest $request, $id, UpdateMilestone $action)
    {
        $action->execute($id, $request->validated());

        return redirect()->route('admin.milestones.index')->with('success', 'Milestone updated.');
    }

    public function destroy($id, DeleteMilestone $action)
    {
        $action->execute($id);

        return redirect()->route('admin.milestones.index')->with('success', 'Milestone deleted.');
    }
}
