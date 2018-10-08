<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('titulo_id')->unsigned();
            $table->integer('docente_id')->unsigned()->nullable();
            $table->integer('curso_id')->unsigned();
            $table->timestamps();
            $table->foreign('titulo_id')->references('id')->on('titulos');
            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->foreign('curso_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asignaturas', function (Blueprint $table) {
            $table->dropForeign(['titulo_id']);
            $table->dropColumn('titulo_id');
            $table->dropForeign(['docente_id']);
            $table->dropColumn('docente_id');
            $table->dropForeign(['curso_id']);
            $table->dropColumn('curso_id');
        });
        Schema::dropIfExists('asignaturas');
    }
}
