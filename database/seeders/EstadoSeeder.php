<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mexico_id = 146;
        $mexicoEstados = [
            [
                'nombre' => 'Aguascalientes',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Baja California',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Baja California Sur',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Campeche',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Coahuila de Zaragoza',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Colima',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Chiapas',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Chihuahua',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Distrito Federal',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Durango',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Guanajuato',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Guerrero',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Hidalgo',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Jalisco',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'México',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Michoacán de Ocampo',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Morelos',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Nayarit',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Nuevo León',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Oaxaca de Juárez',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Puebla',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Querétaro',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Qana Roo',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'San Luis Potosí',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Sinaloa',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Sonora',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Tabasco',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Tamaulipas',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Tlaxcala',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Veracruz de Ignacio de la Llave',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Yucatán',
                'pais_id' => $mexico_id
            ],
            [
                'nombre' => 'Zacatecas',
                'pais_id' => $mexico_id
            ]
        ];

        foreach ($mexicoEstados as $key => $item) {
            Estado::create([
                'pais_id' =>  $item['pais_id'],
                'descripcion' => mb_strtoupper($item['nombre']),
            ]);
        }
    }
}