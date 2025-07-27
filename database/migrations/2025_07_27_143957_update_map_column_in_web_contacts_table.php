<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('web_contacts', function (Blueprint $table) {
            $table->text('map')->nullable()->change(); // Mengubah tipe kolom 'map' menjadi 'text'
        });
    }

    public function down(): void
    {
        Schema::table('web_contacts', function (Blueprint $table) {
            $table->string('map', 255)->nullable()->change(); // Mengembalikan kolom 'map' ke tipe string dengan panjang 255
        });
    }
};
