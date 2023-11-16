<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_outputs', function (Blueprint $table) {
            $table->increments('id');
            $table->float('amount');
            $table->longtext('note');
            $table->date('date_output')->nullable();

            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('produtos')->onDelete('cascade');
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
        Schema::dropIfExists('products_outputs');
    }
}
