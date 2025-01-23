@extends('Admin.layout.master_admin')
@section('sessao_admin')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <h4>Cadastro de Pessoal Clínico</h4>
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="{{ route('home_admin') }}">Voltar</a></li>
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
                                        <label>Nome</label>
                                        <input type="text" class="form-control" placeholder="Digite o nome">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Informe o Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Telefone</label>
                                        <input type="telefone" class="form-control" placeholder="Informe o Nº Telefone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Número de Ordem</label>
                                        <input type="number" class="form-control" placeholder="Informe o Nº Ordem">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Especialidade</label>
                                        <select class="form-control default-select">
                                            <option>Medico</option>
                                            <option>Medico Interno</option>
                                            <option>Enfermeiro</option>
                                            <option>Fisioterapia</option>
                                            <option>CArdiologista</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Categoria</label>
                                        <select class="form-control default-select">
                                            <option>Medico</option>
                                            <option>Enfermeiro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Confirmar Password</label>
                                        <input type="password" class="form-control" placeholder="Confirma Password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Genero</label>
                                        <select id="inputState" class="form-control default-select">
                                            <option selected>Selecione</option>
                                            <option>Masculino</option>
                                            <option>Femenino</option>
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