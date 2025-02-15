<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            UtenteSeeder::class,
            AtendimentoSeeder::class,
            SeguradoraSeeder::class,
            EspecialidadeSeeder::class,
            PessoalClinicoSeeder::class,
            HistoricoFamiliarSeeder::class,
            TriagemSeeder::class,
            DepartamentoSeeder::class,
            PrescricaoSeeder::class,
            ExameSeeder::class,
        ]);
    }
}
