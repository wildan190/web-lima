<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug')->unique();
            $table->string('picture_upload')->nullable();
            $table->longText('content');
            $table->string('tag')->nullable(); // Bisa comma-separated atau gunakan relasi many-to-many
            $table->string('keywords')->nullable(); // Bisa digunakan untuk SEO
            $table->enum('status', ['draft', 'publish', 'hidden'])->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
