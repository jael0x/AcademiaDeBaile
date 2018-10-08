<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotiEvensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noti_evens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',64);
            $table->integer('tipo_id')->unsigned();
            $table->date('fecha');
            $table->string('descripcion', 10240);
            $table->string('img_url')->nullable();
            $table->integer('teatro_id')->unsigned()->nullable();
            $table->date('fecha_eve')->nullable();
            $table->time('hora_eve')->nullable();
            $table->float('precio')->unsigned()->nullable();
            $table->integer('docente_id')->unsigned()->nullable();
            $table->integer('periodo_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('teatro_id')->references('id')->on('teatros');
            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->foreign('periodo_id')->references('id')->on('periodos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('noti_evens', function (Blueprint $table) {
            $table->dropForeign(['tipo_id']);
            $table->dropColumn('tipo_id');
            $table->dropForeign(['teatro_id']);
            $table->dropColumn('teatro_id');
            $table->dropForeign(['docente_id']);
            $table->dropColumn('docente_id');
            $table->dropForeign(['periodo_id']);
            $table->dropColumn('periodo_id');
        });
        Schema::dropIfExists('noti_evens');
    }
}
