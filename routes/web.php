<?php

use App\Http\Controllers\AutenticacaoController;
use Illuminate\Support\Facades\Route;


// Rotas para o site
Route::view('/', 'layout.site.home')->name('inicio');
// Route::view('/ponto-atendimento', 'layout.site.home')->name('inicio');

Route::view('/marcacao', 'login.siteLogin.marcacao')->name('marcacao');

// Rotas para Autenticção 
Route::middleware(['throttle:10,1'])->group(function () {

    Route::view('/login', 'login.siteLogin.formLogar')       ->name('login');
    Route::view('/register', 'login.siteLogin.formCadastrar')->name('register');
    
    Route::post('/login',    [AutenticacaoController::class, 'login'])   ->name('login');
    Route::post('/register', [AutenticacaoController::class, 'register'])->name('register');
});

// Route View 
Route::prefix('admin')->group(function(){
    // Route::view('/sec', 'layout.admin.home');  
    Route::view('/sec', 'layout.recpccao.cadastro'); 
    
    Route::view('/login', 'login.adminLogin.login')->name('admin.login');
    Route::post('/login', [AutenticacaoController::class, 'login'])->name('admin.login');
});

Route::view('/teste', 'teste1');

// Route::view('/sec', 'layout.recpccao.cadastro');  