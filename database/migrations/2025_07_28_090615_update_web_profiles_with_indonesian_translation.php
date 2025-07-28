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

            $about['id'] = 'Sejak 2012, kami telah tumbuh menjadi kekuatan utama di balik olahraga perguruan tinggi di Indonesia — mendorong pertumbuhan kompetisi mahasiswa di seluruh negeri.';

            $vision['id'] = 'Menjadi platform terdepan untuk kompetisi olahraga dan hiburan mahasiswa — membentuk budaya kampus di seluruh Indonesia.';

            $mission['id'] = 'Membangun ekosistem bisnis yang sehat dan berkelanjutan. Terus berinovasi dalam program mahasiswa di bidang olahraga, pendidikan, dan hiburan. Menyediakan platform bagi mahasiswa berbakat dan bersemangat untuk berkembang dan bersinar.';

            $history['id'] = 'Didirikan pada 15 Mei 2012, LIMA adalah perusahaan yang berorientasi pada tujuan, berkomitmen untuk memberdayakan mahasiswa Indonesia melalui platform terintegrasi yang dibangun atas dasar olahraga, hiburan, dan pendidikan. Sebagai kekuatan utama dalam kehidupan kampus, LIMA menjembatani pengalaman akademik dan non-akademik, mendorong pengembangan bakat, kreativitas, dan produktivitas. Kami berdedikasi untuk membentuk generasi masa depan yang dinamis, berdampak, dan siap memimpin.';

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
        // Tidak menghapus terjemahan id, karena ini adalah penambahan konten
    }
};
