@extends('Admin.layout.master_admin')

@section('sessao_admin')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Lista de Exames</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('pagina_inicial') }}">Voltar</a>
                    </li>
                </ol>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Todos os Exames</h4>
                            <a href="{{ route('exames') }}" class="btn btn-primary">+ Novo</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850 table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Tipo de Exame</th>
                                            <th>Especialidade</th>
                                            <th>Estado</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dateExame as $dados)
                                            <tr>
                                                <td>{{ $dados->tipo }}</td>
                                                <td>{{ $dados->especialidade->nome }}</td>
                                                <td>{{ $dados->status }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#editExamModal{{ $dados->id }}"
                                                            class="btn btn-primary btn-xs me-1" title="Editar">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form action="{{ route('exames_destroy', $dados->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Tem certeza que deseja remover esta especialidade?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>


                                            <!-- Modal de Edição -->
                                            <div class="modal fade" id="consultarModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar Exame</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="Diagnostico">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar Exame</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="solicitarPescricaoModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar Exame</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="solicitarExameModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar Exame</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="consultarModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar Exame</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
















                                            <!-- Modal de Edição -->
                                            <div class="modal fade" id="editExamModal{{ $dados->id }}">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar Exame</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('exames_update', $dados->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label>Tipo de Exame</label>
                                                                        <input type="text" class="form-control"
                                                                            name="tipo" value="{{ $dados->tipo }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label>Especialidade</label>
                                                                        <select class="form-control default-select"
                                                                            name="especialidade_id" required>
                                                                            @foreach ($dateEsp as $dado)
                                                                                <option value="{{ $dado->id }}"
                                                                                    @if ($dados->especialidade_id == $dado->id) selected @endif>
                                                                                    {{ $dado->nome }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('especialidade_id')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label>Estado</label>
                                                                        <select class="form-control default-select"
                                                                            name="status">
                                                                            <option value="Ativo"
                                                                                @if ($dados->status == 'Ativo') selected @endif>
                                                                                Ativo</option>
                                                                            <option value="Desativo"
                                                                                @if ($dados->status == 'Desativo') selected @endif>
                                                                                Desativado</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light"
                                                                        data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Salvar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
@endsection
