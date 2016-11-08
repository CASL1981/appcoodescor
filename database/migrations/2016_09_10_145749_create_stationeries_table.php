<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stationeries', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado')->default(false);//true cuando el pedido sea aprobado
            $table->date('fechafinalizado'); //fecha de envio por parte del usurio
            $table->date('fechaaprobado');
            $table->date('fecharecibido');
            $table->string('comentarios');
            $table->integer('user_id')->unsigned();
            // $table->integer('pedido_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('pedido_id')->references('id')->on('orders');
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
