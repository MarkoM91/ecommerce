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
         Schema::create('products', function (Blueprint $table) {
             $table->id();  // Creates an 'id' column with unsignedBigInteger
             $table->string('name');
             $table->text('description')->nullable();
             $table->decimal('price', 8, 2);
             $table->string('brand');
             $table->integer('size');
             $table->string('color');
             $table->string('image')->nullable();
             $table->integer('stock')->default(0);
             $table->timestamps();
         });
     }





    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
