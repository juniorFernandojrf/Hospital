@extends('layout.admin.master')
@section('titulo', 'LA VIDA')
@section('content')

    <!-- Right Section -->
    <div class="col-md-9">
        <form class="p-2" id="registrationForm" action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Row to align fields horizontally -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror"
                        id="inputName" name="nome" placeholder="Informe seu Nome" value="{{ old('nome') }}"
                        required>
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">E-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        id="inputEmail" name="email" placeholder="Informe seu E-mail"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Senha</label>
                    <input type="password" class="form-control @error('senha') is-invalid @enderror"
                        id="inputPassword" name="senha" placeholder="Informe sua Senha" required>
                    @error('senha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputPasswordConfirmation" class="form-label">Confirmar Senha</label>
                    <input type="password"
                        class="form-control @error('senha_confirmation') is-invalid @enderror"
                        id="inputPasswordConfirmation" name="senha_confirmation"
                        placeholder="Confirme sua Senha" required>
                    @error('senha_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- New Row for additional fields -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="inputPhone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control @error('telefone') is-invalid @enderror"
                        id="inputPhone" name="telefone" placeholder="Informe seu Telefone"
                        value="{{ old('telefone') }}" required>
                    @error('telefone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="inputAddress" class="form-label">Morada</label>
                    <input type="text" class="form-control @error('morada') is-invalid @enderror"
                        id="inputAddress" name="morada" placeholder="Informe sua Morada"
                        value="{{ old('morada') }}" required>
                    @error('morada')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="inputPostalCode" class="form-label">Código Postal</label>
                    <input type="text" class="form-control @error('codigoPostal') is-invalid @enderror"
                        id="inputPostalCode" name="codigoPostal" placeholder="Informe o Código Postal"
                        value="{{ old('codigoPostal') }}" required>
                    @error('codigoPostal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="inputBirthDate" class="form-label">Data de Aniversário</label>
                    <input type="date" class="form-control @error('dataAnivers') is-invalid @enderror"
                        id="inputBirthDate" name="dataAnivers" value="{{ old('dataAnivers') }}" required>
                    @error('dataAnivers')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="inputGender" class="form-label">Sexo</label>
                    <select class="form-select @error('sexo') is-invalid @enderror" id="inputGender"
                        name="sexo" required>
                        <option value="" disabled selected>Selecione o sexo</option>
                        <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino
                        </option>
                        <option value="Feminino" {{ old('sexo') == 'Feminino' ? 'selected' : '' }}>Feminino
                        </option>
                    </select>
                    @error('sexo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="inputCivilStatus" class="form-label">Estado Civil</label>
                    <select class="form-select @error('estadoCivil') is-invalid @enderror"
                        id="inputCivilStatus" name="estadoCivil" required>
                        <option value="" disabled selected>Selecione o Estado Civil</option>
                        <option value="Solteiro" {{ old('estadoCivil') == 'Solteiro' ? 'selected' : '' }}>
                            Solteiro</option>
                        <option value="Casado" {{ old('estadoCivil') == 'Casado' ? 'selected' : '' }}>Casado
                        </option>
                        <option value="Divorciado" {{ old('estadoCivil') == 'Divorciado' ? 'selected' : '' }}>
                            Divorciado</option>
                        <option value="Viúvo" {{ old('estadoCivil') == 'Viúvo' ? 'selected' : '' }}>Viúvo
                        </option>
                    </select>
                    @error('estadoCivil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="inputLocation" class="form-label">Localização</label>
                    <input type="text" class="form-control @error('localizacao') is-invalid @enderror"
                        id="inputLocation" name="localizacao" placeholder="Informe sua Localização"
                        value="{{ old('localizacao') }}" required>
                    @error('localizacao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="inputFinancialEntity" class="form-label">Seguradora</label>
                    <input type="text"
                        class="form-control @error('entidadeFinanceira') is-invalid @enderror"
                        id="inputFinancialEntity" name="entidaFinance"
                        placeholder="Informe a Entidade Financeira" value="{{ old('entidaFinance') }}">
                    @error('entidaFinance')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="inputUserNumber" class="form-label">Número Seguradora</label>
                    <input type="text" class="form-control @error('numSegura') is-invalid @enderror"
                        id="inputUserNumber" name="numSegura" placeholder="Informe o Número de Utente"
                        value="{{ old('numSegura') }}">
                    @error('numSegura')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </form>
    </div>

    @endsection
