@extends('Admin.layout.master_admin')
@section('sessao_admin')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Cadastro de Pessoal Clínico</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('pagina_inicial') }}">Voltar</a></li>
                </ol>                
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Formulário de Cadastro</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('cadastro_pclinico') }}" method="POST" onsubmit="return validarFormulario()">
                                    @csrf
                                    <div class="row">
                                        <!-- Nome -->
                                        <div class="form-group col-md-6">
                                            <label>Nome</label>
                                            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Digite o nome" value="{{ old('nome') }}" required>
                                            @error('nome')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Informe o Email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Telefone -->
                                        <div class="form-group col-md-6">
                                            <label>Telefone</label>
                                            <input type="text" id="telefone" name="telefone" class="form-control @error('telefone') is-invalid @enderror" placeholder="Informe o Nº Telefone" value="{{ old('telefone') }}" required>
                                            @error('telefone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Gênero -->
                                        <div class="form-group col-md-6">
                                            <label>Gênero</label>
                                            <select id="inputState" name="sexo" class="form-control default-select @error('sexo') is-invalid @enderror" required>
                                                <option selected disabled>Selecione</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Feminino">Feminino</option>
                                            </select>
                                            @error('sexo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Especialidade -->
                                        <div class="form-group col-md-6">
                                            <label>Especialidade</label>
                                            <select class="form-control default-select @error('especialidade') is-invalid @enderror" name="especialidade" required>
                                                <option selected disabled>Selecione</option>
                                                @foreach ($dateEsp as $dado)
                                                    <option value="{{ $dado->id }}">{{ $dado->nome }}</option>
                                                @endforeach
                                            </select>
                                            @error('especialidade')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Categoria -->
                                        <div class="form-group col-md-6">
                                            <label>Categoria</label>
                                            <select class="form-control default-select @error('categoria') is-invalid @enderror" name="categoria" required>
                                                <option selected disabled>Selecione</option>
                                                <option value="Medico">Médico</option>
                                                <option value="Enfermeiro">Enfermeiro</option>
                                                <option value="Recepcionista">Recepcionista</option>
                                            </select>
                                            @error('categoria')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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

    <script>
        function validarFormulario() {
            const telefone = document.getElementById('telefone').value.trim();
            const email = document.getElementById('email').value.trim();

            // Validação do telefone (deve começar com 91, 92, 93, 94, 95 ou 97 e ter exatamente 9 dígitos)
            const telefoneRegex = /^(91|92|93|94|95|97)\d{7}$/;
            if (!telefoneRegex.test(telefone)) {
                alert('O numero de telefone deve ser um numero valido!.');
                return false;
            }

            // Validação do email (somente Gmail ou Hotmail)
            const emailRegex = /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com)$/;
            if (!emailRegex.test(email)) {
                alert('O email deve ser do domínio gmail.com ou hotmail.com.');
                return false;
            }

            return true;
        }
    </script>
@endsection
