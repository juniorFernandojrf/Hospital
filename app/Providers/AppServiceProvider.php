<?php

namespace App\Providers;

use App\Models\Atriagem;
use App\Models\Especialidade;
use App\Models\PessoalClinico;
use App\Models\User;
use App\Models\Exame;
use App\Models\Utente;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $dateEsp    = Especialidade::paginate(10);
        $datePclino = PessoalClinico::with(['user', 'especialidade'])->get();
        $dateExame  = Exame::with('especialidade')->get();
        $dateUtente = Utente::with('user')
                                ->where('status', 'activo')
                                ->get();
                                
        $datePaciente = Utente::with('user')
                                ->where('status', 'inactivo')
                                ->get();
                                
        $dateTriagem = Atriagem::with('utente')->get();                        

        view()->share('dateEsp',      $dateEsp);
        view()->share('datePclino',   $datePclino);
        view()->share('dateExame',    $dateExame);
        view()->share('dateUtente',   $dateUtente);
        view()->share('datePaciente', $datePaciente);
    }
}
