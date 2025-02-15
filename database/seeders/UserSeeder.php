<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            User::create([
                'nome' => $faker->name,
                'sexo' => $faker->randomElement(['Masculino', 'Femenino']),
                'telefone' => $faker->unique()->numberBetween(100000000, 999999999),
                'email' => strtolower($faker->unique()->safeEmail),
                'email_verified_at' => now(),
                'password' => Hash::make('senha123'), // senha padrão para todos
                // 'remember_token' => \Str::random(10),
            ]);
        }
    }
}
