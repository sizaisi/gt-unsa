<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtCargoAutoridadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gt_cargo_autoridades', function (Blueprint $table) {
            $table->id();
            $table->integer('idcargo');
            $table->integer('idautoridad');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');            
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
        Schema::dropIfExists('gt_cargo_autoridades');
    }
}
