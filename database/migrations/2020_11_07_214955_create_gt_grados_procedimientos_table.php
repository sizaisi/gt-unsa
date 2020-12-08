<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtGradosProcedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gt_grados_procedimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('idgradomodalidad');
            $table->integer('idprocedimiento');
            $table->integer('idrol');
            $table->enum('tipo_rol', ['Asesor', 'Jurado']);
            $table->string('url_formulario', 250);
            $table->tinyInteger('orden');
            $table->string('descripcion', 250);
            $table->boolean('condicion')->default(true);
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
        Schema::dropIfExists('gt_grados_procedimientos');
    }
}
