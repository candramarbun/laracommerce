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
            $table->string('product_code');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_qty');
            $table->string('product_desc');
            $table->integer('product_cat')->unsigned();
            $table->integer('product_sub_cat')->unsigned();
            $table->integer('product_brand')->unsigned();
            $table->timestamps();

            $table->foreign('product_cat')
              ->references('id')
              ->on('categories')
              ->onDelete('cascade')
              ->onUpdate('cascade');

            $table->foreign('product_sub_cat')
              ->references('id')
              ->on('categories')
              ->onDelete('cascade')
              ->onUpdate('cascade');

            $table->foreign('product_brand')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
