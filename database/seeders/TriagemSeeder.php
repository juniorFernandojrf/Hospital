<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TriagemSeeder extends Seeder
{
    public function run()
    {
        DB::table('triagens')->insert([
            [
                'utente_id' => 1,
                'user_id' => 1,
                'pressao_arterial' => '120/80',
                'temperatura' => '36.5',
                'queixas_iniciais' => 'Dor de cabeça constante',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'utente_id' => 2,
                'user_id' => 2,
                'pressao_arterial' => '130/85',
                'temperatura' => '37.2',
                'queixas_iniciais' => 'Febre e tosse',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
