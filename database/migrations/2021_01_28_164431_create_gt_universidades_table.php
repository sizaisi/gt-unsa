<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtUniversidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gt_universidades', function (Blueprint $table) {
            $table->id();
            $table->string('cod_universidad', 45)->comment = 'codigo de universidad enviado por SUNEDU';
            $table->string('razon_social', 250)->comment = 'razon social de la universidad';
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
        Schema::dropIfExists('gt_universidades');
    }
}
