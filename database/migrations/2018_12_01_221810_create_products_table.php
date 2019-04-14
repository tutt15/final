<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('producttype_id')->unsigned()->index()->nullable();
            $table->foreign('producttype_id')->references('id')->on('producttypes')->onDelete('set null');

            $table->string('description');
            $table->string('price');
            $table->string('promotion_price');
            $table->string('image')->nullable();
            $table->string('unit');
            $table->integer('new');
            $table->string('status')->nullable();
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
}
