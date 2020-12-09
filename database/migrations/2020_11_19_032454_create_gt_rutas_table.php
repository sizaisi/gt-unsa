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
            $table->integer('idgradoprocedimiento_origen');
            $table->integer('idgradoprocedimiento_destino');
            $table->enum('etiqueta', ['Iniciar', 'Enviar', 'Derivar', 'Cambiar', 'Devolver', 'Denegar', 'Observar', 'Rechazar', 'Aceptar', 'Aprobar', 'Finalizar']);
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
        Schema::dropIfExists('gt_rutas');
    }
}
