@extends('Admin.layout.master_admin')
@section('sessao_admin')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <h4>Cadastro de Consultas</h4>
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
                            <form>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tipo de Consulta</label>
                                        <input type="text" class="form-control" placeholder="Digite o tipo">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Especialidade</label>
                                        <select class="form-control default-select">
                                            <option>Dermatologia</option>
                                            <option>Dentista</option>
                                            <option>Enfermeiro</option>
                                            <option>Fisioterapia</option>
                                            <option>CArdiologista</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Estado</label>
                                        <select class="form-control default-select">
                                            <option>Ativo</option>
                                            <option>Não Ativo</option>
                                        </select>
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