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
            $table->foreignId('pizza_id')->nullable()->after('id')->constrained('pizza');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dish', function (Blueprint $table) {
            $table->dropColumn('pizza_id');
        });
    }
};
