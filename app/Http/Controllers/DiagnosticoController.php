<!-- <?php

// namespace App\Http\Controllers;

// use App\Models\Diagnostico;
// use Carbon\Carbon;
// use Exception;
// use Illuminate\Http\Request;

// class DiagnosticoController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         try {
//             // dd($request->all());

//             $validated = $request->validate([
//                 'utente_id' => 'required|', // O ID da especialidade deve ser um número inteiro e existir na tabela "especialidades".
//                 'sintomas'  => 'required|string|min:3|max:255', // O tipo deve ser uma string com no máximo 255 caracteres.
//                 'nota'      => 'required|string|min:3|max:255', // O tipo deve ser uma string com no máximo 255 caracteres.

//             ], ([
//                 'utente_id.required' => 'O campo Especialidade é obrigatório.',
//                 'sintomas.required'  => 'O campo consulta é obrigatório.',
//                 'sintomas.string'    => 'O campo consulta deve ser uma string.',
//                 'sintomas.min'       => 'O campo consulta deve ter mais de 2 caracteres.',
//                 'sintomas.max'       => 'O campo Tipo não pode ter mais de 255 caracteres.',
//                 'nota.required'      => 'O campo consulta é obrigatório.',
//                 'nota.string'        => 'O campo consulta deve ser uma string.',
//                 'nota.min'           => 'O campo consulta deve ter mais de 2 caracteres.',
//                 'nota.max'           => 'O campo Tipo não pode ter mais de 255 caracteres.',

//             ]));
//             // dd($validated);

//             $dados = Diagnostico::where('utente_id', $validated['utente_id'])->first();
//             dd($dados->id);

//             if (!$dados) {
//                 $dados = Diagnostico::create([
//                     'user_id'   => auth()->id(),
//                     'utente_id' => $validated['utente_id'],
//                     'sintomas'  => $validated['consulta_id'],
//                     'nota'      => $validated['motivos'],
//                 ]);

//                 return  back()->with('success', 'cadastrado com sucesso!');

//             } else {

//                 $criacao = $dados->created_at;
//                 $diferencaHoras = Carbon::now()->diffInHours($criacao);
//                 if ($diferencaHoras > 24) {

//                     $dados = Diagnostico::create([
//                         'user_id'   => auth()->id(),
//                         'utente_id' => $validated['utente_id'],
//                         'sintomas'  => $validated['consulta_id'],
//                         'nota'      => $validated['motivos'],
//                     ]);
//                 }else {
//                     return back()->with('error', 'Ja possui um Diagnostico');

//                 }
//             }
//             // dd($dados);

//             return  back()->with('success', 'cadastrada com sucesso!');
//         } catch (Exception $e) {
//             return back()->with('error', 'Erro ao cadastrar Diagnostico: ' . $e->getMessage());
//         }
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Diagnostico $diagnostico)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Diagnostico $diagnostico)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Diagnostico $diagnostico)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Diagnostico $diagnostico)
//     {
//         //
//     }
// } -->
