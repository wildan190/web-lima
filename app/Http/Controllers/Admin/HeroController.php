<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroRequest;
use App\Models\Hero;
use Google\Cloud\Storage\StorageClient;

class HeroController extends Controller
{
    protected function uploadToGCS($file): string
    {
        $filename = 'hero/hero_' . time() . '.' . $file->getClientOriginalExtension();

        $storage = new StorageClient([
            'projectId' => config('filesystems.disks.gcs.project_id'),
            'keyFilePath' => config('filesystems.disks.gcs.key_file'),
        ]);

        $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));

        $bucket->upload(file_get_contents($file->getRealPath()), ['name' => $filename]);

        return 'https://storage.googleapis.com/' . config('filesystems.disks.gcs.bucket') . '/' . $filename;
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
            $data['picture_upload'] = $this->uploadToGCS($request->file('picture_upload'));
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
            $data['picture_upload'] = $this->uploadToGCS($request->file('picture_upload'));
        } else {
            unset($data['picture_upload']);
        }

        $hero->update($data);

        return redirect()->route('admin.hero.index')->with('success', 'Hero updated successfully.');
    }

    public function destroy(Hero $hero)
    {
        // Hapus file dari GCS jika ada
        if ($hero->picture_upload) {
            $fileUrl = $hero->picture_upload;

            // Ambil nama objek dari URL
            $parsedUrl = parse_url($fileUrl, PHP_URL_PATH); // contoh: /bucket-name/hero/hero_123456.jpg
            $objectName = ltrim(str_replace('/' . config('filesystems.disks.gcs.bucket') . '/', '', $parsedUrl), '/');

            if ($objectName) {
                $storage = new \Google\Cloud\Storage\StorageClient([
                    'projectId' => config('filesystems.disks.gcs.project_id'),
                    'keyFilePath' => config('filesystems.disks.gcs.key_file'),
                ]);

                $bucket = $storage->bucket(config('filesystems.disks.gcs.bucket'));
                $object = $bucket->object($objectName);

                if ($object->exists()) {
                    $object->delete();
                }
            }
        }

        // Hapus data dari database
        $hero->delete();

        return redirect()->route('admin.hero.index')->with('success', 'Hero deleted successfully.');
    }
}
