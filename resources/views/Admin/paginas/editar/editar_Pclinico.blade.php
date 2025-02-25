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
                                        <div class="form-group col-md-6">
                                            <label>Nome</label>
                                            <input type="text" name="nome" class="form-control"
                                                placeholder="Digite o nome" value="{{ old('nome') }}" required>
                                            @error('nome')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Informe o Email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Telefone</label>
                                            <input type="telefone" name="telefone" class="form-control"
                                                placeholder="Informe o Nº Telefone" value="{{ old('telefone') }}" required>
                                            @error('telefone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Genero</label>
                                            <select id="inputState" name="sexo" class="form-control default-select"
                                                required>
                                                <option selected>Selecione</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                            @error('sexo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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
                                            <label>Categoria</label>
                                            <select class="form-control default-select" name="categoria">
                                                <option value="Medico">Medico</option>
                                                <option value="Enfermeiro">Enfermeiro</option>
                                                <option value="Secretario">Secretario</option>
                                            </select>
                                            @error('categoria')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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
