<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        $carreras = [
            'Ingeniería en Sistemas',
            'Administración de Empresas',
            'Contaduría',
            'Diseño Gráfico',
        ];

        foreach ($carreras as $nombre) {
            Career::firstOrCreate(['nombre' => $nombre]);
        }
    }
}
