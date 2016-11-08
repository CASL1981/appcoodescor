<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('unidad', 20);
            $table->string('marca', 20);
            $table->double('costo',15,2);
            $table->integer('tasa');
            $table->integer('acreedor_id')->unsigned();
            $table->timestamps();

            $table->foreign('acreedor_id')->references('id')->on('creditors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
