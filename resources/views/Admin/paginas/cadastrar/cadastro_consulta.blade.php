@extends('Admin.layout.master_admin')
@section('sessao_admin')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Cadastro de Consultas</h4>
            </div>
            <!-- row -->
            <div class="row">


                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Formulario de Cadastro</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('consultas_form') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Tipo de Consulta</label>
                                            <input type="text" name="tipo" class="form-control" placeholder="Digite o tipo">
                                        </div>
                                        @error('tipo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <!-- Especialidade -->
                                        <div class="form-group col-md-6">
                                            <label>Especialidade</label>
                                            <select
                                                class="form-control default-select @error('especialidade') is-invalid @enderror"
                                                name="especialidade_id" required>
                                                <option selected disabled>Selecione</option>
                                                @foreach ($dateEsp as $dado)
                                                    <option value="{{ $dado->id }}">{{ $dado->nome }}</option>
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

                                    <div class="form-group">

                                    </div>
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
