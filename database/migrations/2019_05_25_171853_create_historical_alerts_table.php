<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricalAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historical_alerts', function (Blueprint $table) {
            $table->increments('id');
            //$table->unsignedInteger('alert_id');
            //$table->foreign('alert_id')->references('id')->on('alerts')->onDelete('cascade');
            $table->integer('product_id');
            $table->string('title');// titulo
            $table->longtext('description'); //descrição do alerta
            $table->datetime('read_in')->nullable(); //lido em

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
        Schema::dropIfExists('historical_alerts');
    }
}
