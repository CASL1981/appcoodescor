<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('articulo_id')->unsigned();//codigo de acticulos por solicitudes de papelria
            $table->integer('existencia');
            $table->integer('cantidad');
            $table->integer('papeleria_id')->unsigned();//codigo de cada saolicitud de papeleria
            $table->text('comentarios');
            $table->timestamps();

            $table->foreign('papeleria_id')->references('id')->on('stationeries');
            $table->foreign('articulo_id')->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
