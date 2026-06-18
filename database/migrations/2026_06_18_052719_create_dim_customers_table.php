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
        Schema::create('dim_customers', function (Blueprint $table) {
            $table->id('customer_id');

            $table->string('customer_code', 20)->unique();
            $table->string('customer_name', 100);

            $table->enum('gender', ['M', 'F']);

            $table->string('city', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dim_customers');
    }
};
