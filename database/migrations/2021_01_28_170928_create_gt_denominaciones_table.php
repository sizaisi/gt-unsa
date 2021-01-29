<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtDenominacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gt_denominaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nues', 45)->comment = 'codigo de la escuela a la que pertenece';
            $table->string('den_m', 250)->comment = 'denomación del grado o título en masculino';
            $table->string('den_f', 250)->comment = 'denomación del grado o título en femenino';
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
        Schema::dropIfExists('gt_denominaciones');
    }
}
