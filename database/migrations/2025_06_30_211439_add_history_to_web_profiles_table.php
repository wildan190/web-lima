<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('web_profiles', function (Blueprint $table) {
            $table->text('history')->nullable()->after('mission');
        });
    }

    public function down(): void
    {
        Schema::table('web_profiles', function (Blueprint $table) {
            $table->dropColumn('history');
        });
    }
};
