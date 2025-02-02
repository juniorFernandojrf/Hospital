@extends('PClinico.Medico.layout.master_admin')
@section('sessao_admin')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="form-head d-flex align-items-center mb-sm-4 mb-3">
                <div class="me-auto">
                    <h2 class="text-black font-w600">Nome Do paciente</h2>
                    <p class="mb-0">sexo</p>
                </div>
                <a href="javascript:void(0)" class="btn btn-primary me-3" data-bs-toggle="modal"
                    data-bs-target="#addOrderModal">Solicitar Exame</a>

                <a href="" class="btn btn-primary me-3">Dar Alta</a>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="addOrderModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="text-black font-w500">Patient Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-black font-w500">Patient ID</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-black font-w500">Disease</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-black font-w500">Date Check In</label>
                                    <input type="date" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
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
                        <li class="nav-item">
                            <a href="#navpills-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Histórico
                                Clinico</a>
                        </li>                        
                        <li class="nav-item">
                            <a href="#navpills-4" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Presquições
                                Médicas </a>
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
                                            <strong>Telefone</strong>
                                            <span class="mb-0">Male</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Email</strong>
                                            <span class="mb-0">PHD</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Data de Aniversário</strong>
                                            <span class="mb-0">Se. Professor</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Morada</strong>
                                            <span class="mb-0">120</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Localização</strong>
                                            <span class="mb-0">120</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Estado Civil</strong>
                                            <span class="mb-0">120</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Código Postal</strong>
                                            <span class="mb-0">120</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Seguradora</strong>
                                            <span class="mb-0">120</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Numero da Seguradora</strong>
                                            <span class="mb-0">120</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="navpills-2" class="tab-pane  fade">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Exames Realizados</strong>
                                            <span class="mb-0">Male</span>
                                            <span class="mb-0">Male</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Historico de Consulta</strong>
                                            <span class="mb-0">PHD</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Diagnostico</strong>
                                            <span class="mb-0">PHD</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>                       
                        <div id="navpills-4" class="tab-pane  fade">
                            <div class="col-3">
                                <a href="javascript:void(0)" class="btn btn-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#addOrderModal1">Prescrver</a>

                            </div><br>

                            <div class="modal fade" id="addOrderModal1">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Prescrição</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label class="text-black font-w500">Descrição</label>
                                                    <textarea id="mensagem" name="mensagem" rows="4" cols="50" ></textarea>
                                                </div>
                                                
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light"
                                                data-bs-dismiss="modal">Cancelar </button>
                                            <button type="button" class="btn btn-primary">Savar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">

                                <!-- Modal -->

                                <div class="card-body pb-0">
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
