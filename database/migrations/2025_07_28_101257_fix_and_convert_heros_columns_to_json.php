<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

// ✅ Tambahkan helper function di atas sebelum dipanggil
if (!function_exists('isJson')) {
    function isJson($string): bool
    {
        if (!is_string($string)) return false;
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}

return new class extends Migration
{
    public function up(): void
    {
        // Step 1: Perbaiki data lama agar semua 'title' dan 'subtitle' valid JSON
        DB::table('heros')->get()->each(function ($hero) {
            $title = isJson($hero->title) ? json_decode($hero->title, true) : ['id' => $hero->title];
            $subtitle = isJson($hero->subtitle) ? json_decode($hero->subtitle, true) : ['id' => $hero->subtitle];

            DB::table('heros')
                ->where('id', $hero->id)
                ->update([
                    'title' => json_encode($title, JSON_UNESCAPED_UNICODE),
                    'subtitle' => json_encode($subtitle, JSON_UNESCAPED_UNICODE),
                ]);
        });

        // Step 2: Ubah kolom menjadi tipe JSON
        Schema::table('heros', function (Blueprint $table) {
            $table->json('title')->nullable()->change();
            $table->json('subtitle')->nullable()->change();
        });
    }

    public function down(): void
    {
        // Rollback ke string biasa
        DB::table('heros')->get()->each(function ($hero) {
            $title = json_decode($hero->title, true);
            $subtitle = json_decode($hero->subtitle, true);

            DB::table('heros')
                ->where('id', $hero->id)
                ->update([
                    'title' => $title['id'] ?? null,
                    'subtitle' => $subtitle['id'] ?? null,
                ]);
        });

        Schema::table('heros', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->string('subtitle')->nullable()->change();
        });
    }
};
