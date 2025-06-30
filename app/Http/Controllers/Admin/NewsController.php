<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Modules\Admin\News\Action\{GetNews, CreateNews, UpdateNews, DeleteNews};

class NewsController extends Controller
{
    public function index(GetNews $action)
    {
        $news = $action->execute();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request, CreateNews $action)
    {
        $action->execute($request->validated());
        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    public function edit($id, GetNews $action)
    {
        $news = $action->find($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update($id, NewsRequest $request, UpdateNews $action)
    {
        $action->execute($id, $request->validated());
        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    public function destroy($id, DeleteNews $action)
    {
        $action->execute($id);
        return back()->with('success', 'News deleted successfully.');
    }
}
