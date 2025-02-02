@extends('Admin.layout.master_admin')
@section('title', 'Adimin')
@section('sessao_admin')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Cadastro de Departamaento</h4>
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
                                <form action="{{ route('cadastar_dep') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Nome </label>
                                            <input type="text" name="nome" class="form-control"
                                                placeholder="Informe o nome">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Nome da Sector</label>
                                            <input type="text" name="sector" class="form-control"
                                                placeholder="Informe o nome">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Nome da Codigo</label>
                                            <input type="text" name="codigo" class="form-control"
                                                placeholder="Informe o nome">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label">
                                                Concordas?
                                            </label>
                                        </div>
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
