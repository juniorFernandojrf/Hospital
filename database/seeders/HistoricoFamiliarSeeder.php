<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistoricoFamiliar;
use Faker\Factory as Faker;

class HistoricoFamiliarSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $parentes = ['Pai', 'Mãe', 'Irmão', 'Irmã', 'Avô', 'Avó', 'Tio', 'Tia'];
        $condicoesMedicas = ['Diabetes', 'Hipertensão', 'Asma', 'Câncer', 'Doença Cardíaca'];

        for ($i = 0; $i < 20; $i++) {
            HistoricoFamiliar::create([
                'parente' => $faker->randomElement($parentes),
                'codicaoMedica' => $faker->randomElement($condicoesMedicas),
                'idade' => $faker->numberBetween(30, 90),
                'comentario' => $faker->sentence(10),
            ]);
        }
    }
}
