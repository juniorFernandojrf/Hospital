@extends('Admin.layout.master_admin')
@section('sessao_admin')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Listar Pessoal Clínico</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('pagina_inicial') }}">Voltar</a></li>
                </ol>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Todos Pessoal Clínico</h4>
                            <a href="{{ route('pclinico_create') }}" class="btn btn-primary">+ Novo</a>
                        </div>

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
                                                    <img class="rounded-circle" width="35" src="{{ asset('assets/images/profile/small/pic1.jpg') }}" alt="Foto do Pessoal Clínico">
                                                </td>
                                                <td>{{ $dados->user->nome }}</td>
                                                <td>{{ $dados->numOrdem }}</td>
                                                <td>{{ $dados->especialidade->nome }}</td>
                                                <td>{{ $dados->user->email }}</td>
                                                <td>{{ $dados->user->telefone }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editModal{{ $dados->id }}" class="btn btn-primary btn-xs me-1" title="Editar">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form action="{{ route('pclinico_destroy', $dados->user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este registro?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-xs" title="Remover">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                    <!-- Modal de Edição -->
                                                    <div class="modal fade" id="editModal{{ $dados->id }}">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Editar Pessoal Clínico</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('pclinico_update', $dados->id) }}" method="POST" onsubmit="return validarFormulario(this)">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6">
                                                                                <label>Nome</label>
                                                                                <input type="text" name="nome" class="form-control" value="{{ $dados->user->nome }}" required>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label>Email</label>
                                                                                <input type="email" name="email" class="form-control" value="{{ $dados->user->email }}" required>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label>Telefone</label>
                                                                                <input type="text" name="telefone" class="form-control" value="{{ $dados->user->telefone }}" required>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label>Especialidade</label>
                                                                                <select class="form-control" name="especialidade" required>
                                                                                    @foreach ($dateEsp as $dado)
                                                                                        <option value="{{ $dado->id }}" {{ $dados->especialidade_id == $dado->id ? 'selected' : '' }}>{{ $dado->nome }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                                                        </div>
                                                                    </form>
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
@endsection

@section('scripts')
<script>
    function validarFormulario(form) {
        const telefone = form.telefone.value;
        const email = form.email.value;
        
        const telefoneRegex = /^(91|92|93|94|95|97)\d{7}$/;
        const emailRegex = /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com)$/;

        if (!telefoneRegex.test(telefone)) {
            alert("O telefone deve começar com 91-97 e ter 9 dígitos!");
            return false;
        }
        
        if (!emailRegex.test(email)) {
            alert("O email deve ser do Gmail ou Hotmail!");
            return false;
        }
        return true;
    }
</script>
@endsection
