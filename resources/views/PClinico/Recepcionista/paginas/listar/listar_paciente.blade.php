@extends('PClinico.Recepcionista.layout.master_admin')
@section('sessao_admin')
    <!--**********************************
                    Content body start
                ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                <div class="me-auto">
                    <h2 class="text-black font-w600">Paciente</h2>
                    <p class="mb-0">Hospital La Vida</p>
                </div>
                <div>
                    <a href="javascript:void(0)" class="btn btn-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#addOrderModal">+ Novo Paciente</a>
                </div>
            </div>
            <!-- Add Order -->
            <div class="modal fade" id="addOrderModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Adicionar Paciente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                @csrf
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
                                        <label>Morada</label>
                                        <input type="text" name="morada" class="form-control"
                                            placeholder="Informe sua Morada" value="{{ old('morada') }}" required>
                                        @error('morada')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Codigo Postal </label>
                                        <input type="text" name="codigoPostal" class="form-control"
                                            placeholder="Informe seu codigoPostal" value="{{ old('codigoPostal') }}"
                                            required>
                                        @error('codigoPostal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputBirthDate" class="form-label">Data de Aniversário</label>
                                        <input type="date"
                                            class="form-control @error('dataAnivers') is-invalid @enderror"
                                            id="inputBirthDate" name="dataAnivers" value="{{ old('dataAnivers') }}"
                                            required>
                                        @error('dataAnivers')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Genero</label>
                                        <select id="inputState" name="sexo" class="form-control default-select" required>
                                            <option selected>Selecione</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                        @error('sexo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputCivilStatus" class="form-label">Estado Civil</label>
                                        <select class="form-select @error('estadoCivil') is-invalid @enderror"
                                            id="inputCivilStatus" name="estadoCivil" required>
                                            <option value="" disabled selected>Selecione o Estado Civil</option>
                                            <option value="Solteiro"
                                                {{ old('estadoCivil') == 'Solteiro' ? 'selected' : '' }}>
                                                Solteiro</option>
                                            <option value="Casado" {{ old('estadoCivil') == 'Casado' ? 'selected' : '' }}>
                                                Casado
                                            </option>
                                            <option value="Divorciado"
                                                {{ old('estadoCivil') == 'Divorciado' ? 'selected' : '' }}>
                                                Divorciado</option>
                                            <option value="Viúvo" {{ old('estadoCivil') == 'Viúvo' ? 'selected' : '' }}>
                                                Viúvo
                                            </option>
                                        </select>
                                        @error('estadoCivil')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputFinancialEntity" class="form-label">Seguradora</label>
                                        <input type="text"
                                            class="form-control @error('entidadeFinanceira') is-invalid @enderror"
                                            id="inputFinancialEntity" name="entidaFinance"
                                            placeholder="Informe a Entidade Financeira" value="{{ old('entidaFinance') }}">
                                        @error('entidaFinance')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputUserNumber" class="form-label">Número Seguradora</label>
                                        <input type="text"
                                            class="form-control @error('numSegura') is-invalid @enderror"
                                            id="inputUserNumber" name="numSegura"
                                            placeholder="Informe o Número de Utente" value="{{ old('numSegura') }}">
                                        @error('numSegura')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="table-responsive card-table">
                        <table id="example5" class="display dataTablesCard white-border table-responsive-xl">
                            <thead>
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Date Check In</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Genero</th>
                                    <th>Room No</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>#P-00015</td>
                                    <td>26/02/2020, 12:42 AM</td>
                                    <td>Bella Simatupang</td>
                                    <td>Dr. Olivia Jean</td>
                                    <td>Hearing Loss</td>
                                    <td>
                                        <span class="badge badge-info light">
                                            <i class="fa fa-circle text-info me-1"></i>
                                            Recovered
                                        </span>
                                    </td>
                                    <td>AB-005</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal"
                                            data-bs-target="#addOrderModall"><i
                                                    class="fa fa-pencil"></i></a><!-- Botão de remoção -->
                                            {{-- <form action="" method="POST"
                                                onsubmit="return confirm('Tem certeza que deseja remover esta especialidade?');">
                                                @csrf
                                                @method('DELETE') --}}
                                                <button type="submit" class="btn btn-danger shadow btn-xs sharp">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {{-- </form> --}}
                                        </div>
                                        <div class="modal fade" id="addOrderModall">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Editar Paciente</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="POST">
                                                            @csrf
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
                                                                    <label>Morada</label>
                                                                    <input type="text" name="morada" class="form-control"
                                                                        placeholder="Informe sua Morada" value="{{ old('morada') }}" required>
                                                                    @error('morada')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="form-group col-md-6">
                                                                    <label>Codigo Postal </label>
                                                                    <input type="text" name="codigoPostal" class="form-control"
                                                                        placeholder="Informe seu codigoPostal" value="{{ old('codigoPostal') }}"
                                                                        required>
                                                                    @error('codigoPostal')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputBirthDate" class="form-label">Data de Aniversário</label>
                                                                    <input type="date"
                                                                        class="form-control @error('dataAnivers') is-invalid @enderror"
                                                                        id="inputBirthDate" name="dataAnivers" value="{{ old('dataAnivers') }}"
                                                                        required>
                                                                    @error('dataAnivers')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="form-group col-md-6">
                                                                    <label>Genero</label>
                                                                    <select id="inputState" name="sexo" class="form-control default-select" required>
                                                                        <option selected>Selecione</option>
                                                                        <option value="Masculino">Masculino</option>
                                                                        <option value="Femenino">Femenino</option>
                                                                    </select>
                                                                    @error('sexo')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputCivilStatus" class="form-label">Estado Civil</label>
                                                                    <select class="form-select @error('estadoCivil') is-invalid @enderror"
                                                                        id="inputCivilStatus" name="estadoCivil" required>
                                                                        <option value="" disabled selected>Selecione o Estado Civil</option>
                                                                        <option value="Solteiro"
                                                                            {{ old('estadoCivil') == 'Solteiro' ? 'selected' : '' }}>
                                                                            Solteiro</option>
                                                                        <option value="Casado" {{ old('estadoCivil') == 'Casado' ? 'selected' : '' }}>
                                                                            Casado
                                                                        </option>
                                                                        <option value="Divorciado"
                                                                            {{ old('estadoCivil') == 'Divorciado' ? 'selected' : '' }}>
                                                                            Divorciado</option>
                                                                        <option value="Viúvo" {{ old('estadoCivil') == 'Viúvo' ? 'selected' : '' }}>
                                                                            Viúvo
                                                                        </option>
                                                                    </select>
                                                                    @error('estadoCivil')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputFinancialEntity" class="form-label">Seguradora</label>
                                                                    <input type="text"
                                                                        class="form-control @error('entidadeFinanceira') is-invalid @enderror"
                                                                        id="inputFinancialEntity" name="entidaFinance"
                                                                        placeholder="Informe a Entidade Financeira" value="{{ old('entidaFinance') }}">
                                                                    @error('entidaFinance')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputUserNumber" class="form-label">Número Seguradora</label>
                                                                    <input type="text"
                                                                        class="form-control @error('numSegura') is-invalid @enderror"
                                                                        id="inputUserNumber" name="numSegura"
                                                                        placeholder="Informe o Número de Utente" value="{{ old('numSegura') }}">
                                                                    @error('numSegura')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer"><button type="button" class="btn btn-primary">Actualizar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                    Content body end
                ***********************************-->
@endsection
