<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_type');
            $table->string('product_desc');
            $table->string('product_price');
            $table->string('product_size');
            $table->string('product_quantity');
            $table->string('tag'); 
            $table->string('stock'); 
            $table->string('review'); 
            $table->string('image');
            $table->unsignedBigInteger('sub_id');
            $table->foreign('sub_id')->references('id')->on('sub_categories');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
