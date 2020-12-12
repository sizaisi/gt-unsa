<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtProcedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gt_procedimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->integer('idgradomodalidad');            
            $table->integer('idrol');
            $table->enum('tipo_rol', ['asesor', 'jurado']);
            $table->string('url_formulario', 250);
            $table->tinyInteger('orden');
            $table->string('descripcion', 250);            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gt_procedimientos');
    }
}
