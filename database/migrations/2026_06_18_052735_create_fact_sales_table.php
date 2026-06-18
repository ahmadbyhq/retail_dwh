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
        Schema::create('fact_sales', function (Blueprint $table) {
            $table->id('sale_id');

            $table->foreignId('product_id')
                ->constrained('dim_products', 'product_id');

            $table->foreignId('customer_id')
                ->constrained('dim_customers', 'customer_id');

            $table->foreignId('time_id')
                ->constrained('dim_times', 'time_id');

            $table->integer('quantity');

            $table->decimal('unit_price', 10, 2);

            $table->decimal('total_price', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fact_sales');
    }
};
