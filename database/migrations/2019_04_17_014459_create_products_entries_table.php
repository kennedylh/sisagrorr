<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products_entries', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id');
        $table->unsignedInteger('produto_id');
        $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
        $table->float('montante');
        $table->date('data_validade');
        $table->float('preco');
        $table->float('qtd_entrada');
        $table->integer('status_output')->default(0);

        $table->unsignedInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');

        $table->unsignedInteger('supplier_id');
        $table->foreign('supplier_id')->references('id')->on('suppliers');

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
        Schema::dropIfExists('products_entries');
    }

}
