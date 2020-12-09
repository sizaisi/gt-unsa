<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtModalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gt_modalidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('gt_modalidades')->insert([
            [
                'nombre' => 'TRABAJO DE INVESTIGACIÓN',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nombre' => 'SUSTENTACIÓN DE TESIS',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),               
            ],
            [
                'nombre' => 'PRUEBA DE SUFICIENCIA PROFESIONAL',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),               
            ],
            [
                'nombre' => 'TRABAJO ACADÉMICO',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nombre' => '	AUTOMÁTICO',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),    
            ],
            [
                'nombre' => 'SERVICIOS PROFESIONALES',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),               
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gt_modalidades');
    }
}
