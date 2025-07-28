<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('heros')->get()->each(function ($hero) {
            // Decode existing JSON
            $title = json_decode($hero->title, true);
            $subtitle = json_decode($hero->subtitle, true);

            // Jika title/subtitle bukan array (bukan JSON), bungkus
            if (!is_array($title)) {
                $title = ['id' => $hero->title];
            }
            if (!is_array($subtitle)) {
                $subtitle = ['id' => $hero->subtitle];
            }

            // Tambahkan kunci 'en' jika belum ada (terjemahan)
            if (!isset($title['en'])) {
                $title['en'] = 'LIGA MAHASISWA'; // Nama tetap
            }

            if (!isset($subtitle['en'])) {
                $subtitle['en'] = 'The Beginning of the Future'; // ← Terjemahan
            }

            // Update ke database
            DB::table('heros')
                ->where('id', $hero->id)
                ->update([
                    'title' => json_encode($title, JSON_UNESCAPED_UNICODE),
                    'subtitle' => json_encode($subtitle, JSON_UNESCAPED_UNICODE),
                ]);
        });
    }

    public function down(): void
    {
        // Menghapus key 'en' dari title dan subtitle
        DB::table('heros')->get()->each(function ($hero) {
            $title = json_decode($hero->title, true);
            $subtitle = json_decode($hero->subtitle, true);

            if (is_array($title) && isset($title['en'])) {
                unset($title['en']);
            }

            if (is_array($subtitle) && isset($subtitle['en'])) {
                unset($subtitle['en']);
            }

            DB::table('heros')
                ->where('id', $hero->id)
                ->update([
                    'title' => json_encode($title, JSON_UNESCAPED_UNICODE),
                    'subtitle' => json_encode($subtitle, JSON_UNESCAPED_UNICODE),
                ]);
        });
    }
};
