<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\Grado;
use App\Models\Modalidad;
use App\Models\GradoModalidad;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::truncate();                
        Rol::create(['nombre' => 'Graduando']);
        Rol::create(['nombre' => 'Unidad de Investigación']);
        Rol::create(['nombre' => 'Escuela']);
        Rol::create(['nombre' => 'Asesor-Jurado']);        
        Rol::create(['nombre' => 'Facultad']);               
        Rol::create(['nombre' => 'Of. de Grados y Títulos']);
        Rol::create(['nombre' => 'Repositorio Institucional']);
        Rol::create(['nombre' => 'Administrador']);

        Grado::truncate();
        Grado::create(
            [
                'nombre' => 'BACHILLER',
                'nive' => 'Z',
                'codigo' => '4',
                'prerequisito' => 1,
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        );
        Grado::create(
            [
                'nombre' => 'TÍTULO PROFESIONAL',
                'nive' => 'Z',
                'codigo' => '4',
                'prerequisito' => 2,
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        );

        Modalidad::truncate();

        Modalidad::create(
            [
                'nombre' => 'AUTOMÁTICO',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),    
            ],
        );

        Modalidad::create(
            [
                'nombre' => 'SUSTENTACIÓN DE TESIS',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),               
            ],
        );

        Modalidad::create(
            [
                'nombre' => 'TRABAJO DE INVESTIGACIÓN',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        );        

        Modalidad::create(
            [
                'nombre' => 'PRUEBA DE SUFICIENCIA PROFESIONAL',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),               
            ],
        );        
        
        Modalidad::create(
            [
                'nombre' => 'SERVICIOS PROFESIONALES',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),               
            ],
        );


        GradoModalidad::truncate();

        //Bachiller - Automático (id:1)
        GradoModalidad::create(
            [
                'idgrado' => 1,
                'idmodalidad' => 1,
                'componente' => 'Bachiller-Automatico',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),               
            ],
        );

        //Título profesional - Sustentación de tesis (id:2)
        GradoModalidad::create(
            [
                'idgrado' => 2,
                'idmodalidad' => 2,
                'componente' => 'TituloProfesional-SustentancionTesis',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),               
            ],
        );
    }
}
