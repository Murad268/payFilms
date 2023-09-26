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
        Schema::create('documentals_episodes', function (Blueprint $table) {
            $table->id();
            $table->integer('episode_order');
            $table->unsignedBigInteger('serie_id');
            $table->unsignedBigInteger('season_id');
            $table->string('episode_name')->nullable();
            $table->string('quality');
            $table->string('release');
            $table->string('length');
            $table->string('link');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentals_episodes');
    }
};
