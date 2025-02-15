@extends('Admin.layout.master_admin')
@section('sessao_admin')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <h4>Cadastro de Exames</h4>
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="{{ route('pagina_inicial') }}">Voltar</a></li>
            </ol>
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
                            <form action="{{ route('exames') }} " method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tipo de Exme</label>
                                        <input type="text" class="form-control" placeholder="Digite o tipo" name="tipo">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Especialidade</label>
                                        <select class="form-control default-select" name="especialidade_id">
                                          
                                            @foreach ($dateEsp as $dado)
                                            {{-- carregar todas as especialidade --}}
                                                <option name="{{ $dado->id }}" value="{{ $dado->id }}">{{ $dado->nome }} </option>
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