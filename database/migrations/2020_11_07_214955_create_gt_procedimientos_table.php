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
            $table->integer('idtramite');            
            $table->integer('idrol');
            $table->enum('tipo_rol', ['asesor', 'jurado'])->nullable();
            $table->string('componente', 250);
            $table->tinyInteger('orden');
            $table->string('descripcion', 1000);            
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
