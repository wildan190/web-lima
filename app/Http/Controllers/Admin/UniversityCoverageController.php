<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UniversityCoverageRequest;
use App\Modules\Admin\UniversityCoverage\Action\CreateUniversityCoverage;
use App\Modules\Admin\UniversityCoverage\Action\UpdateUniversityCoverage;
use App\Repositories\Interface\UniversityCoverageRepositoryInterface;
use Illuminate\Http\Request;

class UniversityCoverageController extends Controller
{
    protected $repository;

    public function __construct(UniversityCoverageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $coverages = $this->repository->getAll();
        return view('admin.university_coverage.index', compact('coverages'));
    }

    public function create()
    {
        return view('admin.university_coverage.create');
    }

    public function store(UniversityCoverageRequest $request, CreateUniversityCoverage $action)
    {
        $action->execute($request->validated());
        return redirect()->route('admin.university-coverages.index')->with('success', 'University coverage created.');
    }

    public function edit($id)
    {
        $coverage = $this->repository->findById($id);
        return view('admin.university_coverage.edit', compact('coverage'));
    }

    public function update(UniversityCoverageRequest $request, $id, UpdateUniversityCoverage $action)
    {
        $action->execute($id, $request->validated());
        return redirect()->route('admin.university-coverages.index')->with('success', 'University coverage updated.');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.university-coverages.index')->with('success', 'University coverage deleted.');
    }
}
