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
        Schema::create('order_header', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_Id')->constrained('customer');
            $table->foreignId('delivery_type_Id')->constrained('delivery_type');
            $table->foreignId('payment_type_Id')->constrained('payment_type');
            $table->foreignId('payment_status_Id')->constrained('payment_status');
            $table->foreignId('employee_Id')->nullable()->constrained('users');
            $table->float('total_price', 6, 2);
            $table->string('gateway_code')->nullable();
            $table->string('company_name')->nullable();
            $table->string('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_header');
    }
};
