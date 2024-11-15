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
        Schema::create('turistik_teses', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->foreignId('emlak_id');
            $table->string('kapali_alan_metrekare')->nullable();
            $table->integer('acik_alan_metrekare')->nullable();
            $table->string('oda_sayisi',20)->nullable();
            $table->integer('binanin_kat_sayisi')->nullable();
            $table->integer('binanin_yasi')->nullable();
            $table->integer('yatak_Sayisi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turistik_teses');
    }
};
