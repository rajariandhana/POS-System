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
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignUuid('order_id')->references('id')->on('orders')->onDelete('restrict');
            $table->foreignId('product_id')->nullable();;
            // $table->string('product_name');
            $table->integer('qty')->unsigned();
            $table->integer('price')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
