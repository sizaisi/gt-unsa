<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtProgramasAcreditadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gt_programas_acreditados', function (Blueprint $table) {
            $table->id();
            $table->string('nues', 45)->comment = 'codigo de la escuela a la que pertenece';
            $table->string('nombre_programa', 250)->comment = 'nombre del programa acreditado';
            $table->date('fecha_inicio_acreditacion')->comment = 'fecha de inicio del programa acreditado';
            $table->date('fecha_fin_acreditacion')->comment = 'fecha de fin del programa acreditado';
            $table->boolean('estado')->comment = '0 activo, 1 inactivo';     
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
        Schema::dropIfExists('gt_programas_acreditados');
    }
}
