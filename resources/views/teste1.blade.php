<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="col-md-9">
        <form class="p-2" id="registrationForm" action="{{ route('register')}}" method="POST">
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

               
            </div>            

            <div class="text-center">
                <button type="submit" class="btn w-100 fw-bold" style="background-color: #1985e4b6; color:#f7f9fc;">Criar
                    Conta</button>
            </div>
            <div class="text-center mt-3">
                <p>Ja tenho uma conta!<a href="{{ route('login') }}" class="fcad">Entrar</a></p>
            </div>
        </form>
    </div>
    <script src="app.js"></script>
</body>
</html>