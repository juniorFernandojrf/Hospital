<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;
use Faker\Factory as Faker;

class DepartamentoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $setores = ['Administração', 'Cardiologia', 'Laboratório', 'Pediatria', 'Neurologia'];

        foreach ($setores as $setor) {
            Departamento::create([
                'nome' => $faker->unique()->word(),
                'sector' => $setor,
                'codigo' => strtoupper($faker->randomLetter() . $faker->randomLetter() . rand(100, 999)),
            ]);
        }
    }
}
