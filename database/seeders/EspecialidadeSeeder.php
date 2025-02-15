<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especialidade;
use Faker\Factory as Faker;

class EspecialidadeSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $especialidades = ['Cardiologia', 'Neurologia', 'Ortopedia', 'Pediatria', 'Dermatologia'];

        foreach ($especialidades as $nome) {
            Especialidade::create([
                'nome' => $nome,
                'estado' => $faker->randomElement(['Ativo', 'Inativo']),
            ]);
        }
    }
}
