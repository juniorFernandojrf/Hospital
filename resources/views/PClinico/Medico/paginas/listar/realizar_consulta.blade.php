@extends('PClinico.Medico.layout.master_admin')
@section('sessao_admin')
    <div class="content-body">
        @if (session('success'))
            {{-- <div class="alert alert-success">{{ session('success') }}</div> --}}
            <div class="alert alert-success alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg>
                <strong>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
            </div>
        @endif

        @if (session('error'))
            {{-- <div class="alert alert-danger">{{ session('error') }}</div> --}}
            <div class="alert alert-danger alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                </svg>
                <strong>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
            </div>
        @endif
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="text-black font-w600">Paciente: {{ $UtenteTriagem->nome }}</h2>
                    <p class="text-muted mb-0">{{ $UtenteTriagem->sexo }}</p>
                </div>
                <!-- Exibir mensagens de sucesso ou erro -->

                <div>
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#consultarModal">Consultar</button>
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#Diagnostico">Diagnostico</button>
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#solicitarPescricaoModal">Prescrição Medica</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#solicitarExameModal">Solicitar
                        Exame</button>
                </div>
            </div>

            <!-- Modal de Edição -->
            <div class="modal fade" id="consultarModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Consultar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('cons_store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Tipo da Consulta </label>
                                        <select class="form-control default-select @error('consulta') is-invalid @enderror"
                                            name="consulta_id" required>
                                            <option selected disabled>Selecione</option>
                                            @foreach ($consulta as $dado)
                                                <option value="{{ $dado->id }}">{{ $dado->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="notes">Observações Do Medico</label>
                                        <textarea id="motivos" name="motivos" rows="4" cols="50"></textarea>
                                        <input hidden name="utente_id" value="{{ $UtenteTriagem->id }}">

                                        @error('motivo')
                                            <div class="invalid-feedback">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="Diagnostico">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Diagnostico</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('diagn_store') }}" method="POST">
                                @csrf
                                <!-- Nome -->
                                <div class="form-group col-md-12">
                                    <label>Sintomas</label>
                                    <input hidden name="utente_id" value="{{ $UtenteTriagem->id }}">
                                    <input type="text" name="sintomas"
                                        class="form-control @error('sintomas') is-invalid @enderror"
                                        placeholder="Digite os sintomas" value="{{ old('sintomas') }}" required>
                                    @error('sintomas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Nome -->
                                <div class="form-group col-md-12">
                                    <label>Nota </label>
                                    <input type="text" name="nota"
                                        class="form-control @error('nota') is-invalid @enderror"
                                        placeholder="Digite o nota" value="{{ old('nota') }}" required>
                                    @error('nota')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="solicitarPescricaoModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Prescrição Medica</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('presc_store') }}" method="POST">
                                @csrf
                                <!-- Nome -->
                                <div class="form-group col-md-12">
                                    <label>Medicamentos</label>
                                    <input hidden name="utente_id" value="{{ $UtenteTriagem->id }}">
                                    <input type="text" name="medicamento"
                                        class="form-control @error('medicamento') is-invalid @enderror"
                                        placeholder="Digite os medicamento" value="{{ old('medicamento') }}" required>
                                    @error('medicamento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Nome -->
                                <div class="form-group col-md-12">
                                    <label>Duração </label>
                                    <input type="text" name="duracao"
                                        class="form-control @error('duracao') is-invalid @enderror"
                                        placeholder="Digite o duracao" value="{{ old('duracao') }}" required>
                                    @error('duracao')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="notes">Observações Do Medico</label>
                                    <textarea id="observacao" name="observacao" rows="4" cols="50"></textarea>

                                    @error('observacao')
                                        <div class="invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="solicitarExameModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Solicitar Exame</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('solicitar_store') }}" method="POST">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label>Tipo de Exame </label>
                                    <select class="form-control default-select @error('tipo') is-invalid @enderror"
                                        name="exame_id" required>
                                        <option selected disabled>Selecione</option>
                                        @foreach ($exame as $dado)
                                            <option value="{{ $dado->id }}">{{ $dado->tipo }}</option>
                                        @endforeach
                                    </select>
                                    <input hidden name="utente_id" value="{{ $UtenteTriagem->id }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Especialidade </label>
                                    <select
                                        class="form-control default-select @error('especialidade') is-invalid @enderror"
                                        name="especialidade_id" required>                                        
                                        <option selected disabled>Selecione</option>
                                        @foreach ($dateEsp as $dado)
                                            <option value="{{ $dado->id }}">{{ $dado->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="nav nav-tabs mt-4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#cadastro">Informações de Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#triagem">Dados de Triagem</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#historico">Histórico Clinico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#prescricao">Presquições Médicas</a>
                </li>
            </ul>

            <div class="tab-content mt-3">
                <div id="cadastro" class="tab-pane fade show active">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach (['Telefone' => 'telefone', 'Email' => 'email', 'Data de Aniversário' => 'dataAnivers', 'Morada' => 'morada', 'Localização' => 'localizacao', 'Estado Civil' => 'estadoCivil', 'Código Postal' => 'codigoPostal', 'Seguradora' => 'entidaFinance', 'Número da Seguradora' => 'numSegura'] as $label => $campo)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>{{ $label }}</strong>
                                        <span>{{ $UtenteTriagem->$campo }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="triagem" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach (['Pressão Arterial' => 'pressao_arterial', 'Temperatura' => 'temperatura', 'Queixas Iniciais' => 'queixas_iniciais'] as $label => $campo)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>{{ $label }}</strong>
                                        <span>{{ $UtenteTriagem->$campo }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="historico" class="tab-pane fade">
                    <div class="card-header d-sm-flex d-block pb-0 border-0">
                        <div class="me-auto pe-3">
                            <h4 class="text-black fs-20 mb-0"></h4>
                        </div>
                        <div class="card-action card-tabs mt-3 mt-sm-0 mt-3 mb-sm-0 mb-3 mt-sm-0">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#Daily" role="tab">
                                        Exames Realizados
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Weekly" role="tab">
                                        Historico de Consulta
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Monthly" role="tab">
                                        Diagnostico
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Daily" role="tabpanel">
                                <H1>olllla </H1>
                            </div>
                            <div class="tab-pane fade" id="Weekly" role="tabpanel">
                                <h2>Segunda</h2>
                            </div>
                            <div class="tab-pane fade" id="Monthly" role="tabpanel">
                                <h3>Terceira</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prescricao" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach (['Pressão Arterial' => 'pressao_arterial', 'Temperatura' => 'temperatura', 'Queixas Iniciais' => 'queixas_iniciais'] as $label => $campo)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>{{ $label }}</strong>
                                        <span>{{ $UtenteTriagem->$campo }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
