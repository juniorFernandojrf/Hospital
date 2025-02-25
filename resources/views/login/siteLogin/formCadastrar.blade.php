@extends('login.siteLogin.loginMaster')
@section('titulo', 'Register')
@section('Form')

    <!-- Mensagem de Sucesso -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Mensagem de Erro -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Multi Columns Form -->
    <div class="d-flex align-items-center justify-content-center" style="background-color: #e5ecf5; min-height: 100vh;">
        <div class="container p-4 bg-white shadow rounded" style="max-width: 1110px; width: 100%;">
            <div class="row g-0">
                <!-- Left Section -->
                <div class="col-md-3 text-white d-flex flex-column align-items-center justify-content-center"
                    style="background-color: #1985e4b6; padding: 2rem;">
                    <h2 class="fw-bold">Cuidar da saúde é um ato de amor próprio e coletivo.</h2>
                    <p>Adicione suas informações abaixo para <strong>criar uma Conta.</strong></p>
                    <h1 class="logo text-center" style="width: 100px; margin-top: auto; "><a href="{{ route('inicio') }}"
                            style="color:#f7f9fc;">LA VIDA</a></h1>
                </div>

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
                                    required pattern="^[A-Za-zÀ-ÿ\s]+$" title="O nome deve conter apenas letras e espaços.">
                                @error('nome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">E-mail</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="inputEmail" name="email" placeholder="Informe seu E-mail"
                                    value="{{ old('email') }}" required
                                    pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                                    title="Informe um e-mail válido.">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="inputPassword" class="form-label">Senha</label>
                                <input type="password" class="form-control @error('senha') is-invalid @enderror"
                                    id="inputPassword" name="senha" placeholder="Informe sua Senha" required
                                    minlength="8" title="A senha deve ter no mínimo 8 caracteres.">
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
                                    value="{{ old('telefone') }}" required required pattern="^\d{9,9}$"
                                    title="Informe um telefone válido (somente números, 9 dígitos).">
                                @error('telefone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="inputAddress" class="form-label">Morada</label>
                                <input type="text" class="form-control @error('morada') is-invalid @enderror"
                                    id="inputAddress" name="morada" placeholder="Informe sua Morada"
                                    value="{{ old('morada') }}" required pattern="^[A-Za-zÀ-ÿ\s]+$"
                                    title="O nome deve conter apenas letras e espaços.">
                                @error('morada')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="inputPostalCode" class="form-label">Código Postal</label>
                                <input type="text" class="form-control @error('codigoPostal') is-invalid @enderror"
                                    id="inputPostalCode" name="codigoPostal" placeholder="Informe o Código Postal"
                                    value="{{ old('codigoPostal') }}" required >
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

                        <div class="text-center">
                            <button type="submit" class="btn w-100 fw-bold"
                                style="background-color: #1985e4b6; color:#f7f9fc;">Criar
                                Conta</button>
                        </div>
                        <div class="text-center mt-3">
                            <p>Ja tenho uma conta!<a href="{{ route('login') }}" class="fcad">Entrar</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("registrationForm");

            form.addEventListener("submit", function(event) {
                let isValid = true;

                // Função para exibir mensagem de erro
                function showError(input, message) {
                    const errorDiv = input.nextElementSibling;
                    input.classList.add("is-invalid");
                    errorDiv.textContent = message;
                    errorDiv.style.display = "block";
                }

                // Função para limpar erro
                function clearError(input) {
                    input.classList.remove("is-invalid");
                    input.nextElementSibling.style.display = "none";
                }

                // Validação Nome Completo
                const nome = document.getElementById("inputName");
                const nomePattern = /^[A-Za-zÀ-ÿ\s]+$/;
                if (!nomePattern.test(nome.value.trim())) {
                    showError(nome, "O nome deve conter apenas letras e espaços.");
                    isValid = false;
                } else {
                    clearError(nome);
                }

                // Validação E-mail
                const email = document.getElementById("inputEmail");
                const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!emailPattern.test(email.value.trim())) {
                    showError(email, "Informe um e-mail válido.");
                    isValid = false;
                } else {
                    clearError(email);
                }

                // Validação Senha
                const senha = document.getElementById("inputPassword");
                if (senha.value.length < 8) {
                    showError(senha, "A senha deve ter no mínimo 8 caracteres.");
                    isValid = false;
                } else {
                    clearError(senha);
                }

                // Validação Confirmação de Senha
                const senhaConfirm = document.getElementById("inputPasswordConfirmation");
                if (senha.value !== senhaConfirm.value) {
                    showError(senhaConfirm, "As senhas não coincidem.");
                    isValid = false;
                } else {
                    clearError(senhaConfirm);
                }

                // Validação Telefone (9 dígitos numéricos)
                const telefone = document.getElementById("inputPhone");
                const telefonePattern = /^\d{9}$/;
                if (!telefonePattern.test(telefone.value.trim())) {
                    showError(telefone, "Informe um telefone válido com 9 dígitos.");
                    isValid = false;
                } else {
                    clearError(telefone);
                }


                // Validação de campos obrigatórios
                const requiredFields = [
                    "inputAddress",
                    "inputBirthDate",
                    "inputGender",
                    "inputCivilStatus",
                    "inputLocation"
                ];

                requiredFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field.value.trim() === "") {
                        showError(field, "Este campo é obrigatório.");
                        isValid = false;
                    } else {
                        clearError(field);
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>


@endsection
