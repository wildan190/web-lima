<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('web_profiles', function (Blueprint $table) {
            $table->json('about')->nullable()->change();
            $table->json('vision')->nullable()->change();
            $table->json('mission')->nullable()->change();
            $table->json('history')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('web_profiles', function (Blueprint $table) {
            $table->text('about')->nullable()->change();
            $table->text('vision')->nullable()->change();
            $table->text('mission')->nullable()->change();
            $table->text('history')->nullable()->change();
        });
    }
};
