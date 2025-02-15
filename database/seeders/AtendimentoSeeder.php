<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Atendimento;
use App\Models\Utente;
use Faker\Factory as Faker;

class AtendimentoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $utentes = Utente::all();

        foreach ($utentes as $utente) {
            Atendimento::create([
                'utente_id' => $utente->id,
                'horaChegada' => $faker->dateTimeThisYear,
                'status' => $faker->randomElement(['Em_progresso', 'Finalizado', 'Cancelado']),
            ]);
        }
    }
}
