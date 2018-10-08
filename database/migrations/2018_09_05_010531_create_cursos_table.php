<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',64);
            $table->integer('edad_min')->unsigned();
            $table->integer('edad_max')->unsigned();
            $table->integer('periodo_id')->unsigned()->nullable();
            $table->float('precio_inscripcion')->unsigned();
            $table->float('precio_mensual')->unsigned();
            $table->integer('color_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('periodo_id')->references('id')->on('periodos');
            $table->foreign('color_id')->references('id')->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['periodo_id']);
            $table->dropColumn('periodo_id');
            $table->dropForeign(['color_id']);
            $table->dropColumn('color_id');
        });
        Schema::dropIfExists('cursos');
    }
}
