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
        Schema::create('konut_isyeris', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->foreignId('emlak_id');
            $table->string('oda_sayisi',20)->nullable();
            $table->integer('binanin_kat_sayisi')->nullable();
            $table->integer('binanin_yasi')->nullable();
            $table->string('isinma_tipi',20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konut_isyeris');
    }
};
