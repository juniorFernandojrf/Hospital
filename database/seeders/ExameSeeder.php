<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exame;
use App\Models\Especialidade;
use Faker\Factory as Faker;

class ExameSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $especialidades = Especialidade::all();

        $tiposExames = ['Raio-X', 'Ultrassom', 'Eletrocardiograma', 'Tomografia', 'Ressonância Magnética'];
        
        foreach ($especialidades as $especialidade) {
            Exame::create([
                'especialidade_id' => $especialidade->id,
                'tipo' => $faker->randomElement($tiposExames),
                'status' => $faker->randomElement(['Ativo', 'Desativo']),
            ]);
        }
    }
}
