<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\Tramite;
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

        Tramite::truncate();
        
        Tramite::create(
            [
                'nombre' => 'Bachiller - Automatico',
                'codigo' => 4,
                'componente' => 'Bachiller-Automatico',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),               
            ],
        );

        Tramite::create(
            [
                'nombre' => 'Título Profesional - Sustentación de Tesis',
                'codigo' => 4,
                'componente' => 'TituloProfesional-SustentacionTesis',
                'created_at' => date("Y-m-d H:i:s"),         
                'updated_at' => date("Y-m-d H:i:s"),               
            ],
        );
    }
}
