<?php

namespace App\Repositories;

use App\Models\ContactBanner;
use App\Repositories\Interface\ContactBannerRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ContactBannerRepository implements ContactBannerRepositoryInterface
{
    public function getFirst()
    {
        return ContactBanner::first();
    }

    public function updateOrCreate(array $data)
    {
        $existing = ContactBanner::first();

        if ($existing) {
            if (isset($data['upload_picture']) && $existing->upload_picture) {
                Storage::disk('public')->delete($existing->upload_picture);
            }

            $existing->update($data);
        } else {
            ContactBanner::create($data);
        }
    }
}
