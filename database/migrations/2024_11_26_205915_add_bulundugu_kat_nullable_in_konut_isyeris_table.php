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
        Schema::table('konut_isyeris', function (Blueprint $table) {
            //
            $table->integer('bulundugu_kat')->nullable()->after('binanin_kat_sayisi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konut_isyeris', function (Blueprint $table) {
            //
        });
    }
};
