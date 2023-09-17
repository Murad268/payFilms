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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string("poster");
            $table->string("banner");
            $table->string("length");
            $table->string("link");
            $table->string('ytrailer');
            $table->string("quality");
            $table->text('actors');
            $table->text('scriptwriters');
            $table->text('directors');
            $table->text('countries');
            $table->unsignedBigInteger("movie_category_id");
            $table->unsignedBigInteger("movie_home_category_id");;
            $table->string("release");
            $table->text("desc");
            $table->boolean("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
