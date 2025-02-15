@extends('PClinico.Enfermeiro.layout.master_admin')
@section('sessao_admin')
    <!--**********************************
                            Content body start
                        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                <div class="me-auto">
                    <h2 class="text-black font-w600">Triagem Dos Pacientes </h2>
                </div>                
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card">                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850 table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nome</th>
                                            <th>Nº de Ordem</th>
                                            <th>Especialidade</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datePclino as $dados)
                                            <tr>
                                                <td>
                                                    <img class="rounded-circle" width="35"
                                                        src="{{ asset('assets/images/profile/small/pic1.jpg') }}"
                                                        alt="Foto do Pessoal Clínico">
                                                </td>
                                                <td>{{ $dados->user->nome }}</td>
                                                <td>{{ $dados->numOrdem }}</td>
                                                <td>{{ $dados->especialidade->nome }}</td>
                                                <td>{{ $dados->user->email }}</td>
                                                <td>{{ $dados->user->telefone }}</td>
                                                <td>
                                                    <div class="d-flex">                                                        
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#addOrderModal"
                                                            class="btn btn-primary btn-xs me-1" title="Editar"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <form action="{{ route('pclinico_destroy',$dados->user->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Tem certeza que deseja remover este registro?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-xs"
                                                                title="Remover"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                    <!-- Add Order -->
                                                    <div class="modal fade" id="addOrderModal">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Adicionar Paciente</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('pclinico_update', $dados->id) }}" onsubmit="return validarFormulario()" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="row">
                                                                            <!-- Nome -->
                                                                            <div class="form-group col-md-6">
                                                                                <label>Nome</label>
                                                                                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Digite o nome" value="{{ old('nome') }}" required>
                                                                                @error('nome')
                                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                    
                                                                            <!-- Email -->
                                                                            <div class="form-group col-md-6">
                                                                                <label>Email</label>
                                                                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Informe o Email" value="{{ old('email') }}" required>
                                                                                @error('email')
                                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                    
                                                                            <!-- Telefone -->
                                                                            <div class="form-group col-md-6">
                                                                                <label>Telefone</label>
                                                                                <input type="text" id="telefone" name="telefone" class="form-control @error('telefone') is-invalid @enderror" placeholder="Informe o Nº Telefone" value="{{ old('telefone') }}" required>
                                                                                @error('telefone')
                                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                    
                                                                            <!-- Gênero -->
                                                                            <div class="form-group col-md-6">
                                                                                <label>Gênero</label>
                                                                                <select id="inputState" name="sexo" class="form-control default-select @error('sexo') is-invalid @enderror" required>
                                                                                    <option selected disabled>Selecione</option>
                                                                                    <option value="Masculino">Masculino</option>
                                                                                    <option value="Feminino">Feminino</option>
                                                                                </select>
                                                                                @error('sexo')
                                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                    
                                                                            <!-- Especialidade -->
                                                                            <div class="form-group col-md-6">
                                                                                <label>Especialidade</label>
                                                                                <select class="form-control default-select @error('especialidade') is-invalid @enderror" name="especialidade" required>
                                                                                    <option selected disabled>Selecione</option>
                                                                                    @foreach ($dateEsp as $dado)
                                                                                        <option value="{{ $dado->id }}">{{ $dado->nome }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('especialidade')
                                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                    
                                                                            <!-- Categoria -->
                                                                            <div class="form-group col-md-6">
                                                                                <label>Categoria</label>
                                                                                <select class="form-control default-select @error('categoria') is-invalid @enderror" name="categoria" required>
                                                                                    <option selected disabled>Selecione</option>
                                                                                    <option value="Medico">Médico</option>
                                                                                    <option value="Enfermeiro">Enfermeiro</option>
                                                                                    <option value="Secretario">Secretário</option>
                                                                                </select>
                                                                                @error('categoria')
                                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>                                        
                                    
                                                                        </div>
                                    
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light"
                                                                        data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="button"
                                                                        class="btn btn-primary">Cadastrar</button>
                                                                </div>
                                                            </div>
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
    </div>
    <!--**********************************
                            Content body end
                        ***********************************-->
@endsection
