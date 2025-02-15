@extends('PClinico.Enfermeiro.layout.master_admin')
@section('sessao_admin')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Cadastro de Paciente</h4>
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
                                            <select id="inputState" name="sexo" class="form-control default-select"
                                                required>
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
                                                <option value="Casado"
                                                    {{ old('estadoCivil') == 'Casado' ? 'selected' : '' }}>Casado
                                                </option>
                                                <option value="Divorciado"
                                                    {{ old('estadoCivil') == 'Divorciado' ? 'selected' : '' }}>
                                                    Divorciado</option>
                                                <option value="Viúvo"
                                                    {{ old('estadoCivil') == 'Viúvo' ? 'selected' : '' }}>Viúvo
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
                                                placeholder="Informe a Entidade Financeira"
                                                value="{{ old('entidaFinance') }}">
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

                                    <div class="form-group">
                                        <br>
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
