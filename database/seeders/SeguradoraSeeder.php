<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seguradora;
use App\Models\Utente;
use Faker\Factory as Faker;

class SeguradoraSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $utentes = Utente::all(); // Pegando todos os utentes criados

        foreach ($utentes as $utente) {
            Seguradora::create([
                'utente_id' => $utente->id,
                'entidaFinance' => $faker->company,
                'numSegura' => $faker->unique()->numerify('SEG-#####'),
            ]);
        }
    }
}
