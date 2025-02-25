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
                                <form action="{{ route('consulta_update', $date->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Define o método como PUT -->

                                    <div class="row">
                                        <!-- Campo Nome -->
                                        <div class="form-group col-md-6">
                                            <label>Tipo de Consulta</label>
                                            <input type="text" name="tipo" value="{{ $date->tipo }}"
                                                class="form-control" placeholder="Digite o tipo">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Especialidade</label>
                                            <select class="form-control default-select" name="especialidade">

                                                @foreach ($dateEsp as $dado)
                                                    {{-- carregar todas as especialidade --}}
                                                    <option name="{{ $dado->id }}" value="{{ $dado->nome }}">
                                                        {{ $dado->nome }} </option>
                                                    {{-- <input type="hidden" name="{{ $dado->id }}"> --}}
                                                @endforeach
                                            </select>
                                            @error('especialidade')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Estado</label>
                                            <select class="form-control default-select" name="status">
                                                <option value="Ativo" selected>Ativo</option>
                                                <option value="Desativo">Desactivo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Checkbox de Confirmação -->
                                    <div class="form-group">

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
