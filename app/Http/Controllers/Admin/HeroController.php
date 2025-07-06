<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroRequest;
use App\Models\Hero;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
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

        if ($request->hasFile('picture_upload')) {
            $data['picture_upload'] = $request->file('picture_upload')->store('hero', 'public');
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

        if ($request->hasFile('picture_upload')) {
            if ($hero->picture_upload) {
                Storage::disk('public')->delete($hero->picture_upload);
            }
            $data['picture_upload'] = $request->file('picture_upload')->store('hero', 'public');
        }

        $hero->update($data);

        return redirect()->route('admin.hero.index')->with('success', 'Hero updated successfully.');
    }
}
