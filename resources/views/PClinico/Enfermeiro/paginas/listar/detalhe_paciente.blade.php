@extends('PClinico.Enfermeiro.layout.master_admin')
@section('sessao_admin')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="form-head d-flex align-items-center mb-sm-4 mb-3">
                <div class="me-auto">
                    <h2 class="text-black font-w600">Paciente: {{ $UtenteTriagem->user->nome }} </h2>
                    <h4 class="mb-0"> Prontuario : </h4>
                </div>
                <a href="{{ route('create_Triagem', $UtenteTriagem->id ) }}" class="btn btn-primary me-3" > Criar </a>

            </div>
            
            <div class="form-head page-titles d-flex mb-md-4">
                <div class="d-sm-flex d-block mb-0 align-items-end">
                    <ul class="nav nav-pills review-tab me-3 mb-2">
                        <li class="nav-item">
                            <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab"
                                aria-expanded="false">Informações de Cadastro</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tab-content">
                        <div id="navpills-1" class="tab-pane active show fade">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Genero</strong>
                                            <span class="mb-0">{{ $UtenteTriagem->user->sexo }} </span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Telefone</strong>
                                            <span class="mb-0">{{ $UtenteTriagem->user->telefone }} </span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Email</strong>
                                            <span class="mb-0">{{ $UtenteTriagem->user->email }} </span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Data de Aniversário</strong>
                                            <span class="mb-0">{{ $UtenteTriagem->dataAnivers }} </span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Morada</strong>
                                            <span class="mb-0">{{ $UtenteTriagem->morada }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Localização</strong>
                                            <span class="mb-0">{{ $UtenteTriagem->localizacao }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Estado Civil</strong>
                                            <span class="mb-0">{{ $UtenteTriagem->estadoCivil }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Código Postal</strong>
                                            <span class="mb-0">{{ $UtenteTriagem->codigoPostal }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Seguradora</strong>
                                            <span class="mb-0">{{ $UtenteTriagem->seguradora->estadoCivil }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Numero da Seguradora</strong>
                                            <span class="mb-0">{{ $UtenteTriagem->seguradora->dataAnivers }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="d-md-flex d-block align-items-center mt-4">
                        <nav class="ms-auto">
                            <ul class="pagination">
                                <li class="page-item page-indicator">
                                    <a class="page-link" href="javascript:void()">
                                        <i class="la la-angle-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="javascript:void()">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void()">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void()">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void()">4</a></li>
                                <li class="page-item page-indicator">
                                    <a class="page-link" href="javascript:void()">
                                        <i class="la la-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
