<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\ExameController;
use App\Http\Controllers\PessoalClinicoController;
use App\Http\Controllers\RcuController;
use App\Http\Controllers\TriagemController;
use App\Http\Controllers\SiteController;

use App\Models\Especialidade;
use App\Models\PessoalClinico;
use App\Models\Rcu;
use App\Models\User;
use App\Models\Exame;
use App\Models\Utente;
use App\Services\SenhaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

//------------------------------------------------------------------------------------------
// ===================  Portal externo (Sistena de gestao LA VIDA) =========================
//------------------------------------------------------------------------------------------

// Rotas para o site
Route::get('/', [SiteController::class, 'index'])->name('inicio');
Route::get('/portal-paciente/marcacao', [SiteController::class, 'marcacao'])->name('marcacao');

//Portal do paciente
Route::get('/portal/paciente', [AdminController::class, 'createPaciente'])->name('paciente');

// Rotas para Autenticção 
Route::middleware(['throttle:10,1'])->group(function () {

    Route::view('/login', 'login.siteLogin.formLogar')->name('login');
    Route::view('/register', 'login.siteLogin.formCadastrar')->name('register');

    Route::post('/login',    [AutenticacaoController::class, 'login'])   ->name('login');
    Route::post('/register', [AutenticacaoController::class, 'register'])->name('register');
});

//-----------------------------------------------------------------------------------------------
// ===================  Portal interno (Sistena de gestao LA VIDA) ==============================
//-----------------------------------------------------------------------------------------------

// Protege um grupo de rotas
Route::middleware('auth')->group(function () {
    Route::prefix('portal')->group(function () {
                
        //  =========  ROTAS PARA RECPÇÂO =========================
        Route::get('/cadastro_paciente',           [AtendimentoController::class, 'index'])  ->name('atendimento_index');
        Route::post('/cadastro_paciente',          [AtendimentoController::class, 'store'])  ->name('atendimento_cadastrar');
        Route::get('/cadastro_paciente/create',    [AtendimentoController::class, 'create']) ->name('atendimento_create');
        Route::get('/cadastro_paciente/{id}/edit', [AtendimentoController::class, 'edit'])   ->name('atendimento_editar');
        Route::put('/cadastro_paciente/{id}',      [AtendimentoController::class, 'update']) ->name('atendimento_update');
        Route::get('/agendamento/ver-todos',       [AtendimentoController::class, 'consuta'])->name('atendimento_consuta');
        Route::get('/exame/ver-todos',             [AtendimentoController::class, 'exame'])  ->name('atendimento_exame');
        Route::put('/register-utente/{id}',        [AtendimentoController::class, 'update']) ->name('register_update');
        Route::put('/solicitar-consulta/{id}',     [AtendimentoController::class, 'solicitar']) ->name('solicitar');
        Route::get('/paciente-encaminhado/listar', [AtendimentoController::class, 'encaminhar'])->name('paciente_encaminhado');
        Route::post('/register-utente',            [AtendimentoController::class, 'registerUtente'])->middleware(['throttle:10,1'])->name('register_utente');    
        
        //  =========  ROTAS PARA ENFERMEIRO =========================      
        Route::get('/paciente-triagem/listar',     [TriagemController::class, 'index']) ->name('triagem_create');
        Route::post('/paciente-triagem/cadastrar', [TriagemController::class, 'store']) ->name('triagem_store');
        Route::put('/paciente-triagem/{id}',       [TriagemController::class, 'show'])  ->name('triagem_show');
       
       
       
       
        // Route::post('/triagem',          [TriagemController::class, 'store']) ->name('triagem_cadastrar');
        Route::get('/triagem/listar',    [TriagemController::class, 'listar'])->name('triagem_index');
        // Route::get('/triagem/{id}/edit', [TriagemController::class, 'edit'])  ->name('triagem_editar');
        // Route::put('/triagem/{id}',      [TriagemController::class, 'update'])->name('triagem_update');
        
        // Rotas View
        Route::view('/', 'Admin.paginas.home.home_admin')->name('pagina_inicial');
        // Route::view('/consultaria',     'PClinico.Medico.paginas.home.home_admin')->name('pagina_inicial');
        Route::view('/listar_consulta', 'Admin.paginas.listar.listar_consulta')->name('listar_consulta');
        Route::view('/listar_pclinico', 'Admin.paginas.listar.listar_pclinico')->name('listar_pclinico');
        Route::view('/listar_paciente', 'Admin.paginas.listar.listar_paciente')->name('listar_paciente');
        Route::view('/consultas', 'Admin.paginas.cadastrar.cadastro_consulta') ->name('consultas');
        Route::view('/agendamento_consulta', 'Admin.paginas.agendar.agendamento_consulta')->name('agendamento_consulta');
        Route::view('/agendamento_exames',   'Admin.paginas.agendar.agendamento_exames')  ->name('agendamento_exames');

        // Rotas para Medico

        //Especialdade 
        Route::get('/especialidade',           [EspecialidadeController::class, 'index'])  ->name('especialidade');
        Route::post('/especialidade',          [EspecialidadeController::class, 'store'])  ->name('form_especialidade');
        Route::get('/especialidade/create',    [EspecialidadeController::class, 'create']) ->name('especialidade_create');
        Route::get('/especialidade/{id}/edit', [EspecialidadeController::class, 'edit'])   ->name('especialidade_editar');
        Route::put('/especialidade/{id}',      [EspecialidadeController::class, 'update']) ->name('especialidade_update');
        Route::delete('/especialidade/{id}',   [EspecialidadeController::class, 'destroy'])->name('especialidade_destroy');

        Route::get('/exame/create',  [ExameController::class, 'create'])->name('exames');
        Route::post('/exame/create', [ExameController::class, 'store']) ->name('exames');
        Route::get('/exame/listar',  [ExameController::class, 'index']) ->name('listar_exame');
        Route::put('/exame/{id}',    [ExameController::class, 'update'])->name('exames_update');

        //Pessoal Clinico
        Route::get('/cadastro_pclinico',           [PessoalClinicoController::class, 'index'])  ->name('pclinico');
        Route::post('/cadastro_pclinico',          [PessoalClinicoController::class, 'store'])  ->name('cadastro_pclinico');
        Route::get('/cadastro_pclinico/create',    [PessoalClinicoController::class, 'create']) ->name('pclinico_create');
        Route::get('/cadastro_pclinico/{id}/edit', [PessoalClinicoController::class, 'edit'])   ->name('pclinico_editar');
        Route::put('/cadastro_pclinico/{id}',      [PessoalClinicoController::class, 'update']) ->name('pclinico_update');
        Route::delete('/cadastro_pclinico/{id}',   [PessoalClinicoController::class, 'destroy'])->name('pclinico_destroy');


        Route::get('/med/consultas',      [RcuController::class, 'index'])   ->name('consulta_listar');
        Route::get('/med/atendimento/',   [RcuController::class, 'consulta'])->name('consulta_realizar');
        Route::get('/med/slug/consultas', [RcuController::class, 'show'])    ->name('paciente_detalhes');
        // Route::get('/med/{slug}/consultas', [ConsultaController::class, 'list'])->name('consulta_listar');
        // Route::put('/med/exame',     [ConsultaController::class, 'list'])->name('exame_listar');
    });
});

//-------------------------------------------------------------------------------------------------------
// ======================================================================================================
//------------------------------------------------------------------------------------------

// Routas view 
Route::view('/portal/login', 'Autenticacao.login')->name('form_login');
Route::view('/portal/register', 'Autenticacao.cadastro')->name('form_cadastro');

Route::view('/log', 'login.adminLogin.login')->name('admin_login');
Route::view('/log', 'login.adminLogin.login')->name('admin_login');
// Route::post('/logs', [AutenticacaoController::class, 'login'])->name('admin_login');

// Route::view('/sec', 'layout.recpccao.cadastro');
Route::view('/teste', 'Admins.paginas.home_admin');
Route::view('/teste1', 'teste1');
// Route::post('/teste1', [DepartamentoController::class,'cadastrar'])->name('cadastar_dep');
Route::get('/logout', function (Request $request) {
// Desloga o usuário autenticado
    Auth::logout();

    // Invalida a sessão atual para garantir que o usuário seja desconectado
    $request->session()->invalidate();

    // Regenera o token CSRF para evitar ataques de fixação de token
    $request->session()->regenerateToken();
    
    return dd(auth()->id());
});

Route::get('/tr', function (Request $request) {

    


    // $utente = Utente::where('id', 1)->get();
    // $dados  = $utente->first();
    // // dd( $dados->status);
    
    $dateUtente = User::with('Utente')
                                ->where('status', 'activo')
                                ->get();
dd( $dateUtente);
                                
});
