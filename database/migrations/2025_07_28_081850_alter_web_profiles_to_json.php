<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Simpan data lama ke key 'en' karena isinya bahasa Inggris
        DB::table('web_profiles')->get()->each(function ($profile) {
            DB::table('web_profiles')
                ->where('id', $profile->id)
                ->update([
                    'about' => json_encode(['en' => $profile->about]),
                    'vision' => json_encode(['en' => $profile->vision]),
                    'mission' => json_encode(['en' => $profile->mission]),
                    'history' => json_encode(['en' => $profile->history]),
                ]);
        });
    }

    public function down(): void
    {
        // Ambil isi dari key 'en' saat rollback
        DB::table('web_profiles')->get()->each(function ($profile) {
            $about = json_decode($profile->about, true);
            $vision = json_decode($profile->vision, true);
            $mission = json_decode($profile->mission, true);
            $history = json_decode($profile->history, true);

            DB::table('web_profiles')
                ->where('id', $profile->id)
                ->update([
                    'about' => $about['en'] ?? null,
                    'vision' => $vision['en'] ?? null,
                    'mission' => $mission['en'] ?? null,
                    'history' => $history['en'] ?? null,
                ]);
        });
    }
};
