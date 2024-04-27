<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->bigInteger('farmer_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->integer('quantity');
            $table->string('quantity_description');
            $table->integer('price');
            $table->string('price_description');
            $table->string('place');
            $table->date('period');
            $table->string('photo');

            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');
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
