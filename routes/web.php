<?php

use App\Http\Controllers\AutenticacaoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


//------------------------------------------------------------------------------------------
// ===================  Portal interno (Sistena de gestao LA VIDA) =========================
//------------------------------------------------------------------------------------------

// Rotas para o site
Route::view('/', 'layout.site.home')->name('inicio');
// Route::view('/ponto-atendimento', 'layout.site.home')->name('inicio');

Route::view('/marcacao', 'login.siteLogin.marcacao')->name('marcacao');

// Rotas para Autenticção 
Route::middleware(['throttle:10,1'])->group(function () {

    Route::view('/login', 'login.siteLogin.formLogar')->name('login');
    Route::view('/register', 'login.siteLogin.formCadastrar')->name('register');

    Route::post('/login',    [AutenticacaoController::class, 'login'])->name('login');
    Route::post('/register', [AutenticacaoController::class, 'register'])->name('register');
});

//------------------------------------------------------------------------------------------
// ===================  Portal interno (Sistena de gestao LA VIDA) =========================
//------------------------------------------------------------------------------------------

// Routas view 
Route::view('/portal/login', 'Autenticacao.login')      ->name('form_login');
Route::view('/portal/register', 'Autenticacao.cadastro')->name('form_cadastro');

Route::view('/log', 'login.adminLogin.login')->name('admin_login');
Route::view('/log', 'login.adminLogin.login')->name('admin_login');
// Route::post('/logs', [AutenticacaoController::class, 'login'])->name('admin_login');

// Route::view('/sec', 'layout.admin.home');  
Route::view('/sec', 'layout.recpccao.cadastro');

Route::prefix('portal')->group(function () {

    Route::view('/', 'Admin.paginas.home_admin')->name('home_admin');
    Route::view('/listar_exame', 'Admin.paginas.listar_exame')->name('listar_exame');
    Route::view('/listar_consulta', 'Admin.paginas.listar_consulta')->name('listar_consulta');
    Route::view('/listar_pclinico', 'Admin.paginas.listar_pclinico')->name('listar_pclinico');
    Route::view('/listar_paciente', 'Admin.paginas.listar_paciente')->name('listar_paciente');
    Route::view('/agendamento_consulta', 'Admin.paginas.agendamento_consulta')->name('agendamento_consulta');
    Route::view('/agendamento_exames', 'Admin.paginas.agendamento_exames')->name('agendamento_exames');
    Route::view('/cadastro_pclinico', 'Admin.paginas.cadastro_pclinico')->name('cadastro_pclinico');
    Route::view('/especialidade', 'Admin.paginas.especialidade')->name('especialidade');
    Route::view('/consultas', 'Admin.paginas.consultas')->name('consultas');
    Route::view('/exames', 'Admin.paginas.exames')->name('exames');
    Route::view('/{slug}/triagem', 'layout.recpccao.cadastro');

});

Route::view('/teste', 'teste1');
Route::view('/teste2', 'layout/recpccao/cadastro');

// Route::view('/sec', 'layout.recpccao.cadastro');
