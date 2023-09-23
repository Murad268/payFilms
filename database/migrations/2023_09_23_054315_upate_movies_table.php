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
        Schema::table('movies', function (Blueprint $table) {
            $table->string('name')->charset('utf8')->collation('utf8_general_ci')->change();
            $table->string('slug')->charset('utf8')->collation('utf8_general_ci')->change();
            $table->string("poster")->charset('utf8')->collation('utf8_general_ci')->change();
            $table->string("banner")->charset('utf8')->collation('utf8_general_ci')->change();
            $table->string("link")->charset('utf8')->collation('utf8_general_ci')->change();
            $table->string('ytrailer')->charset('utf8')->collation('utf8_general_ci')->change();
            $table->string("quality")->charset('utf8')->collation('utf8_general_ci')->change();
            $table->text('actors')->charset('utf8')->collation('utf8_general_ci')->change();
            $table->text('scriptwriters')->charset('utf8')->collation('utf8_general_ci')->change();
            $table->text('directors')->charset('utf8')->collation('utf8_general_ci')->change();
            $table->text('countries')->charset('utf8')->collation('utf8_general_ci')->change();
            $table->string("release")->change();
            $table->text("desc")->charset('utf8')->collation('utf8_general_ci')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This is the "down" method to reverse the changes if needed.
        // However, in this example, we are not making any changes in the "down" method.
    }
};
