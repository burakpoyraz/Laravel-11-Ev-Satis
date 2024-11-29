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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->foreignId('emlakid');
            $table->foreignId('userid');
            $table->string('subject',100)->nullable();
            $table->string('question')->nullable();
            $table->string('ip',20)->nullable();
            $table->string('status',5)->default("New")->nullable();
            $table->text('answer')->nullable();
            $table->timestamp('answered_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
