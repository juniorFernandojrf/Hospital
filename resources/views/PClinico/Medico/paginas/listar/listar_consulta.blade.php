@extends('PClinico.Medico.layout.master_admin')
@section('sessao_admin')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                <div class="me-auto">
                    <h2 class="text-black font-w600">Pacientes para a Consulta </h2>
                </div>                
            </div>
            <div class="col-12">
                <div class="card">                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Telefone</th>
                                        <th>Gênero</th>
                                        <th>Morada</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($UtenteTriagem as $dados)
                                            <tr>
                                                <td>{{ $dados->nome }}</td>
                                                <td>{{ $dados->email }}</td>
                                                <td>{{ $dados->telefone }}</td>
                                                <td>{{ $dados->sexo }}</td>
                                                <td>{{ $dados->morada }}</td>
                                                <td>
                                                    <div class="dropdown ms-auto text-end">
                                                        <div class="btn-link" data-bs-toggle="dropdown">
                                                            <svg width="24px" height="24px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2">
                                                                    </circle>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="{{ route('consulta_realizar', $dados->id) }}">Iniciar</a>
                                                            <a class="dropdown-item" href="{{ route('paciente_detalhes') }}">Ver Prontuario</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                                                   
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
