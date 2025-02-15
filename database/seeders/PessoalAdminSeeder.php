<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PessoalAdmin;
use App\Models\User;
use App\Models\Departamento;
use Faker\Factory as Faker;

class PessoalAdminSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::all();
        $departamentos = Departamento::all();
        
        $cargos = ['Gerente', 'Coordenador', 'Supervisor', 'Assistente', 'Secretário'];

        foreach ($users as $user) {
            PessoalAdmin::create([
                'user_id' => $user->id,
                'departamento_id' => $faker->randomElement($departamentos)->id,
                'cargo' => $faker->randomElement($cargos),
            ]);
        }
    }
}
