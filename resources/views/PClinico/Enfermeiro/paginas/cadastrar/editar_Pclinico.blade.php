@extends('PClinico.Enfermeiro.layout.master_admin')
@section('sessao_admin')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Paciente: {{ $UtenteTriagem->user->nome }} </h4>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Formulário da Triagem</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <!-- Ajuste do formulário para a função update -->
                                <form action="{{ route('add_Triagem') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Pressão Arterial </label>
                                            <input type="text" name="pressao_arterial" class="form-control"
                                                placeholder="Digite a pressao_arterial"
                                                value="{{ old('pressao_arterial') }}" required>
                                                <input name="utente_id" value="{{ $UtenteTriagem->id }}" hidden>
                                            @error('pressao_arterial')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Temperatura (°C)</label>
                                            <input type="number" name="temperatura" class="form-control"
                                                placeholder="Informe a temperatura" value="{{ old('temperatura') }}"
                                                required>
                                            @error('temperatura')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Queixas Iniciais</label>
                                            <textarea type="telefone" name="queixas_iniciais" class="form-control" placeholder="Informe as queixas_iniciais"
                                                value="{{ old('queixas_iniciais') }}" required></textarea>
                                            @error('queixas_iniciais')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                            </div>

                            <!-- Checkbox de Confirmação -->
                            <div class="form-group">

                            </div>

                            <!-- Botão de Atualização -->
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
