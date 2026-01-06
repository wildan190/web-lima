<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroRequest;
use App\Models\Hero;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    protected function uploadToLocal($file): string
    {
        $filename = 'hero/hero_' . time() . '.' . $file->getClientOriginalExtension();

        Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));

        return Storage::url($filename);
    }

    public function index()
    {
        $heroes = Hero::latest()->get();

        return view('admin.hero.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.hero.create');
    }

    public function store(HeroRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('picture_upload') && $request->file('picture_upload')->isValid()) {
            $data['picture_upload'] = $this->uploadToLocal($request->file('picture_upload'));
        }

        Hero::create($data);

        return redirect()->route('admin.hero.index')->with('success', 'Hero created successfully.');
    }

    public function edit(Hero $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(HeroRequest $request, Hero $hero)
    {
        $data = $request->validated();

        if ($request->hasFile('picture_upload') && $request->file('picture_upload')->isValid()) {
            $data['picture_upload'] = $this->uploadToLocal($request->file('picture_upload'));
        } else {
            unset($data['picture_upload']);
        }

        $hero->update($data);

        return redirect()->route('admin.hero.index')->with('success', 'Hero updated successfully.');
    }

    public function destroy(Hero $hero)
    {
        if ($hero->picture_upload) {
            $urlPath = parse_url($hero->picture_upload, PHP_URL_PATH);
            if ($urlPath && str_contains($urlPath, '/storage/')) {
                $relativePath = ltrim(str_replace('/storage/', '', $urlPath), '/');
                Storage::disk('public')->delete($relativePath);
            }
        }

        // Hapus data dari database
        $hero->delete();

        return redirect()->route('admin.hero.index')->with('success', 'Hero deleted successfully.');
    }
}
