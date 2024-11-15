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
        Schema::create('emlaks', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title',150);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('address',200)->nullable();
            $table->string('city',25)->nullable();
            $table->string('image',100)->nullable();
            $table->foreignId('categoryid');
            $table->text('detail')->nullable();
            $table->integer('metrekare_toplam_alan')->nullable();
            $table->float('fiyati')->nullable();
            $table->string('krediye_uygunluk',5)->nullable()->default("Evet");
            $table->foreignId('userid');
            $table->string('slug',100)->nullable();
            $table->string('status',5)->nullable()->default('False');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emlaks');
    }
};
