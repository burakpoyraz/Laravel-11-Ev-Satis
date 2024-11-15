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
        Schema::create('arsas', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->foreignId('emlak_id');
            $table->string('tapu_durumu',20)->nullable();
            $table->integer('ada')->nullable();
            $table->integer('parsel')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsas');
    }
};
