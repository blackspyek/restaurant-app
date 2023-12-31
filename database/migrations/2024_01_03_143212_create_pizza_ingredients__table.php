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
        Schema::create('pizza_ingredients_', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pizza_id')->constrained('pizza');
            $table->foreignId('pizza_ingredient_id')->constrained('pizza_ingredient');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_ingredients_');
    }
};
