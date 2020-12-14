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

        DB::table('gt_grados')->insert([
            [
                'nombre' => 'EGRESADO',
                'nive' => 'Z',
                'codigo' => '4',
                'prerequisito' => NULL,
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nombre' => 'BACHILLER',
                'nive' => 'Z',
                'codigo' => '4',
                'prerequisito' => 1,
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nombre' => 'TÍTULO PROFESIONAL',
                'nive' => 'Z',
                'codigo' => '4',
                'prerequisito' => 2,
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
        Schema::dropIfExists('gt_grados');
    }
}
