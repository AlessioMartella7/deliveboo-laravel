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
        Schema::create('order_plate', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained();
            $table->foreignId('plate_id')->constrained();
            $table->unsignedBigInteger('quantity');
            $table->primary(['order_id', 'plate_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_plate');
    }
};