<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('web_contacts', function (Blueprint $table) {
            $table->string('twitter')->nullable()->after('linkedin');
            $table->string('tiktok')->nullable()->after('twitter');
        });
    }

    public function down(): void
    {
        Schema::table('web_contacts', function (Blueprint $table) {
            $table->dropColumn(['twitter', 'tiktok']);
        });
    }
};
