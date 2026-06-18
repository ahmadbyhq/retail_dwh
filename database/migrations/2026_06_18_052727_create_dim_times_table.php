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
        Schema::create('dim_times', function (Blueprint $table) {
            $table->id('time_id');

            $table->date('transaction_date');

            $table->integer('year');
            $table->integer('month');

            $table->string('month_name', 20);

            $table->integer('quarter');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dim_times');
    }
};
