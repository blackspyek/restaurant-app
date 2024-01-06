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
        Schema::table('dish', function (Blueprint $table) {
            $table->string('dish_name')->nullable()->change();
            $table->string('dish_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dish', function (Blueprint $table) {
            $table->string('dish_name')->unique()->change();
            $table->string('dish_description')->change();
        });
    }
};
