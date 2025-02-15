<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar permissões
        Permission::create(['name' => 'acessar_recepcao']);
        Permission::create(['name' => 'acessar_enfermagem']);
        Permission::create(['name' => 'acessar_medico']);

        // Criar papéis
        $recepcao   = Role::create(['name' => 'Recepção']);
        $enfermeiro = Role::create(['name' => 'Enfermeiro']);
        $medico     = Role::create(['name' => 'Médico']);
    }
}
