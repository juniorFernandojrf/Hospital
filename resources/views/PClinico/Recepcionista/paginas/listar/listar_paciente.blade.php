@extends('PClinico.Recepcionista.layout.master_admin')
@section('sessao_admin')

    <div class="content-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="text-black font-w600">Pacientes</h2>
                    <p class="mb-0 text-muted">Gerencie os pacientes do Hospital La Vida</p>
                </div>
                <a href="{{ route('atendimento_create') }}" class="btn btn-primary">
                    <i class="fas fa-user-plus me-2"></i> Novo Paciente
                </a>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display min-w850 table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Gênero</th>
                                <th>Morada</th>
                                <th class="text-end">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($dateUtente as $dados)
                                <tr>
                                    <td>{{ $dados->user->nome }}</td>
                                    <td>{{ $dados->user->email }}</td>
                                    <td>{{ $dados->user->telefone }}</td>
                                    <td>{{ $dados->user->sexo }}</td>
                                    <td>{{ $dados->morada }}</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editPacienteModal{{ $dados->id }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                        <form action="{{ route('solicitar', $dados->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                Consultar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach ($dateUtente as $dados)
        <!-- Modal de Edição -->
        <div class="modal fade" id="editPacienteModal{{ $dados->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Paciente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('register_update', $dados->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nome</label>
                                    <input type="text" name="nome" class="form-control"   value="{{ old('nome', $dados->user->nome) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $dados->user->email) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $dados->user->telefone) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Morada</label>
                                    <input type="text" name="morada" class="form-control"   value="{{ old('morada', $dados->morada) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gênero</label>
                                    <select name="sexo" class="form-select" required>
                                        <option value="Masculino" {{ old('sexo', $dados->user->sexo) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                        <option value="Feminino"  {{ old('sexo', $dados->user->sexo) == 'Feminino' ? 'selected' : ''  }}>Feminino</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Data de Nascimento</label>
                                    <input type="date" name="dataAnivers" class="form-control" value="{{ old('dataAnivers', optional($dados->user->dataAnivers)->format('Y-m-d')) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Estado Civil</label>
                                    <select name="estadoCivil" class="form-select" required>
                                        <option value="Solteiro"   {{ old('estadoCivil', $dados->user->estadoCivil) == 'Solteiro' ? 'selected' : ''   }}>Solteiro</option>
                                        <option value="Casado"     {{ old('estadoCivil', $dados->user->estadoCivil) == 'Casado' ? 'selected' : ''     }}>Casado</option>
                                        <option value="Divorciado" {{ old('estadoCivil', $dados->user->estadoCivil) == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                                        <option value="Viúvo"      {{ old('estadoCivil', $dados->user->estadoCivil) == 'Viúvo' ? 'selected' : ''      }}>Viúvo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer mt-3">
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Atualizar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
