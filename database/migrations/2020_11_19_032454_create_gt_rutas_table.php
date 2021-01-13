<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gt_rutas', function (Blueprint $table) {
            $table->id();
            $table->integer('idtramite');         
            $table->integer('idproc_origen');
            $table->integer('idproc_destino');
            $table->enum('etiqueta', ['iniciar', 'enviar', 'derivar', 'devolver', 'denegar', 'observar', 'rechazar', 'aceptar', 'aprobar', 'finalizar']);
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
        Schema::dropIfExists('gt_rutas');
    }
}
