<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtColacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gt_colaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('horainicio'); 
            $table->time('horafin'); 
            $table->integer('cantidad');   
            $table->integer('maximo');       
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
        Schema::dropIfExists('gt_colaciones');
    }
}
