<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtGradosModalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gt_grados_modalidades', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['Interno', 'Externo'])->default('Interno');
            $table->integer('idgrado');
            $table->integer('idmodalidad');
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
        Schema::dropIfExists('gt_grados_modalidades');
    }
}
