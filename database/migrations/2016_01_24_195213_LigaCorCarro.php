<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LigaCorCarro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liga_carro_cor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cor')->unsigned();
            $table->foreign('id_cor')->references('id')->on('cores');
            $table->integer('id_carro')->unsigned();
            $table->foreign('id_carro')->references('id')->on('carros');
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
        Schema::drop('liga_carro_cor');
    }
}
