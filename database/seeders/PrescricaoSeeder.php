<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prescricao;
use App\Models\Consulta;
use Faker\Factory as Faker;

class PrescricaoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $consultas = Consulta::all();

        $medicamentos = ['Paracetamol', 'Ibuprofeno', 'Amoxicilina', 'Dipirona', 'Omeprazol'];
        $frequencias = ['3 vezes ao dia', '2 vezes ao dia', '1 vez ao dia', 'Após as refeições'];
        $duracoes = ['7 dias', '14 dias', '30 dias', '7 dias com retorno'];
        
        foreach ($consultas as $consulta) {
            Prescricao::create([
                'consulta_id' => $consulta->id,
                'medicamento' => $faker->randomElement($medicamentos),
                'dosagem' => $faker->randomNumber(2) . ' mg',
                'frequencia' => $faker->randomElement($frequencias),
                'duracao' => $faker->randomElement($duracoes),
                'Observacao' => $faker->sentence(),
            ]);
        }
    }
}
