<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Modules\Admin\Gallery\Action\CreateGallery;
use App\Modules\Admin\Gallery\Action\DeleteGallery;
use App\Modules\Admin\Gallery\Action\GetGallery;
use App\Modules\Admin\Gallery\Action\UpdateGallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(GetGallery $action)
    {
        $galleries = $action->execute();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(GalleryRequest $request, CreateGallery $action)
    {
        $action->execute($request->validated());
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery created successfully.');
    }

    public function edit($id, GetGallery $action)
    {
        $gallery = $action->find($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(GalleryRequest $request, $id, UpdateGallery $action)
    {
        $action->execute($id, $request->validated());
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy($id, DeleteGallery $action)
    {
        $action->execute($id);
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery deleted successfully.');
    }
}
