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
       Schema::create('promotions', function (Blueprint $table) {
           $table->id();
           $table->string('code')->unique();
           $table->decimal('discount_amount', 8, 2);
           $table->text('description')->nullable();
           $table->datetime('valid_from')->nullable();   // Changed to datetime
           $table->datetime('valid_until')->nullable();  // Changed to datetime
           $table->timestamps();
       });
   }

   public function down()
   {
       Schema::dropIfExists('promotions');
   }


};
