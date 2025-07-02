<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_banners', function (Blueprint $table) {
            $table->id();
            $table->string('upload_picture'); // path gambar disimpan di storage
            $table->string('title');
            $table->string('subtitle');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_banners');
    }
};
