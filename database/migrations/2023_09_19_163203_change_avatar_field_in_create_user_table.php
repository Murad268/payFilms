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
        // Önce NULL değerleri doldurun veya kaldırın (yukarıdaki adımlar)

        Schema::table('create_main_users', function (Blueprint $table) {
            $table->string('avatar')->default('notfounduser.png')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('create_main_users', function (Blueprint $table) {
            $table->string('avatar')->default('notfounduser.png')->change();
        });
    }
};
