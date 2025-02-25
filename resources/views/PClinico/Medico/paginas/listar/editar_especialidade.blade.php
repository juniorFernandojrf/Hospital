@extends('Admin.layout.master_admin')
@section('title', 'Admin')
@section('sessao_admin')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Editar Especialidade</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('pagina_inicial') }}">Voltar</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Formulário de Edição</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <!-- Ajuste do formulário para a função update -->
                                <form action="{{ route('especialidade_update', $date->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Define o método como PUT -->

                                    <div class="row">
                                        <!-- Campo Nome -->
                                        <div class="form-group col-md-6">
                                            <label>Nome da Especialidade</label>
                                            <input type="text" name="nome" class="form-control"
                                                value="{{ $date->nome }}" placeholder="Informe o nome">
                                        </div>

                                        <!-- Campo Estado -->
                                        <div class="form-group col-md-6">
                                            <label>Estado</label>
                                            <select class="form-control default-select" name="estado">
                                                <option value="activo"
                                                    {{ $date->estado == 'activo' ? 'selected' : '' }}>Ativo
                                                </option>
                                                <option value="desactivo"
                                                    {{ $date->estado == 'desactivo' ? 'selected' : '' }}>Não Ativo
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Checkbox de Confirmação -->
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" required>
                                            <label class="form-check-label">
                                                Concorda com as alterações?
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Botão de Atualização -->
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
