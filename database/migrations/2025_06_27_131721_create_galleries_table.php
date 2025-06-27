<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('picture_upload');
            $table->unsignedBigInteger('sport_id');
            $table->text('description')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
