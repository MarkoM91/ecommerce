<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
     {
         Schema::create('order_items', function (Blueprint $table) {
             $table->id();  // Creates an 'id' column with unsignedBigInteger
             $table->unsignedBigInteger('order_id');
             $table->unsignedBigInteger('product_id');  // Make sure this is unsignedBigInteger
             $table->integer('quantity');
             $table->decimal('price', 8, 2);
             $table->timestamps();

             // Foreign key constraints
             $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
             $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
         });
     }





    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};