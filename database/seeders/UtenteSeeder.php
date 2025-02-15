<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utente;
use App\Models\User;
use Faker\Factory as Faker;

class UtenteSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::all();

        foreach ($users as $user) {
            Utente::create([
                'user_id' => $user->id,
                'dataAnivers' => $faker->date('Y-m-d'),
                'morada' => $faker->address,
                'localizacao' => $faker->city,
                'estadoCivil' => $faker->randomElement(['Solteiro', 'Casado', 'Divorciado', 'Viúvo']),
                'codigoPostal' => $faker->randomNumber(5),
                'status' => $faker->randomElement(['activo', 'inactivo', 'concluido']),
            ]);
        }
    }
}
