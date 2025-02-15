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
                <a href="javascript:void(0)" class="btn btn-primary me-3" data-bs-toggle="modal"
                    data-bs-target="#addOrderModal"> Criar </a>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title text-white" id="addOrderModalLabel">Adicionar Registro</h5>
                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('triagem_store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="pressaoArterial" class="form-label">Pressão Arterial</label>
                                    <input type="text" class="form-control" id="pressaoArterial" name="pressaoArterial"
                                        placeholder="Digite a pressão arterial">
                                </div>
                                <input hidden name="utente_id" value="{{ $UtenteTriagem->id }}">

                                <div class="mb-3">
                                    <label for="temperatura" class="form-label">Temperatura (°C)</label>
                                    <input type="number" step="0.1" class="form-control" id="temperatura"
                                        name="temperatura" placeholder="Digite a temperatura">
                                </div>

                                <div class="mb-3">
                                    <label for="queixasIniciais" class="form-label">Queixas Iniciais</label>
                                    <textarea class="form-control" id="queixasIniciais" name="queixasIniciais" rows="3"
                                        placeholder="Descreva as queixas iniciais"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
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
