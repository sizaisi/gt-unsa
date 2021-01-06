<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gt_grados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('nive', 1);
            $table->string('codigo', 5);
            $table->integer('prerequisito')->nullable();                        
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
        Schema::dropIfExists('gt_grados');
    }
}
