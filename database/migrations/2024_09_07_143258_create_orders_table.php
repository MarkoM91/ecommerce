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
         Schema::create('orders', function (Blueprint $table) {
             $table->id(); // This automatically creates an unsignedBigInteger for the 'id'
             $table->unsignedBigInteger('user_id');
             $table->decimal('total_price', 8, 2);
             $table->string('shipping_address');
             $table->enum('status', ['pending', 'shipped', 'delivered', 'canceled'])->default('pending');
             $table->timestamps();

             // Foreign key constraint for user_id
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         });
     }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
