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
        Schema::create('header_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('movie_id')->nullable();
            $table->string('serie_id')->nullable();
            $table->string('documental_id')->nullable();
            $table->string('order')->default(0);
            $table->string('max-width: 400px')->nullable();
            $table->string('max-width: 768px')->nullable();
            $table->string('max-width: 1024px')->nullable();
            $table->string('max-width: 1368px')->nullable();
            $table->string('default_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_sliders');
    }
};
