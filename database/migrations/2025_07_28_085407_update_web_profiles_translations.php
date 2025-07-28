<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('web_profiles')->get()->each(function ($profile) {
            $about = json_decode($profile->about, true) ?? [];
            $vision = json_decode($profile->vision, true) ?? [];
            $mission = json_decode($profile->mission, true) ?? [];
            $history = json_decode($profile->history, true) ?? [];

            if (!isset($about['id']) && isset($about['en'])) {
                $about['id'] = 'Sejak tahun 2012, kami telah berkembang menjadi kekuatan utama di balik olahraga perguruan tinggi di Indonesia — mendorong pertumbuhan kompetisi mahasiswa secara nasional.';
            }

            if (!isset($vision['id']) && isset($vision['en'])) {
                $vision['id'] = 'Menjadi pelopor utama dalam mengembangkan olahraga mahasiswa di Indonesia.';
            }

            if (!isset($mission['id']) && isset($mission['en'])) {
                $mission['id'] = 'Mendorong mahasiswa untuk berprestasi dalam olahraga melalui kompetisi yang berkualitas dan profesional.';
            }

            if (!isset($history['id']) && isset($history['en'])) {
                $history['id'] = 'LIMA dimulai pada tahun 2012 dengan visi menyatukan semangat kompetitif di kalangan mahasiswa Indonesia.';
            }

            DB::table('web_profiles')
                ->where('id', $profile->id)
                ->update([
                    'about' => json_encode($about),
                    'vision' => json_encode($vision),
                    'mission' => json_encode($mission),
                    'history' => json_encode($history),
                ]);
        });
    }

    public function down(): void
    {
        DB::table('web_profiles')->get()->each(function ($profile) {
            $about = json_decode($profile->about, true) ?? [];
            $vision = json_decode($profile->vision, true) ?? [];
            $mission = json_decode($profile->mission, true) ?? [];
            $history = json_decode($profile->history, true) ?? [];

            unset($about['id'], $vision['id'], $mission['id'], $history['id']);

            DB::table('web_profiles')
                ->where('id', $profile->id)
                ->update([
                    'about' => json_encode($about),
                    'vision' => json_encode($vision),
                    'mission' => json_encode($mission),
                    'history' => json_encode($history),
                ]);
        });
    }
};
