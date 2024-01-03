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
        Schema::create('dish', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_type_id')->constrained('dish_type'); // Use the correct table name 'dish_types'
            $table->string('dish_name')->unique();
            $table->string('dish_description');
            $table->float('dish_price')->default(999)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish');
    }
};
