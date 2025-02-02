<?php

namespace App\Providers;

use App\Models\Especialidade;
use App\Models\PessoalClinico;
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
       $dateEsp    = Especialidade::paginate();
       $datePclino = PessoalClinico::paginate();
       view()->share('dateEsp', $dateEsp);
    }
}
