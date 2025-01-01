@extends('login.siteLogin.loginMaster')
@section('titulo', 'Login')
@section('Form')

    <!-- Multi Columns Form -->
    <div class="d-flex align-items-center justify-content-center" style="background-color: #f7f9fc; min-height: 100vh;">
        <div class="container p-4 bg-white shadow rounded" style="max-width: 1000px; width: 70%;">
            <div class="row g-0">
                <!-- Left Section -->
                <div class="col-md-4 p-4 text-white d-flex flex-column align-items-center justify-content-center"
                    style="background-color: #1985e4b6; padding: 2rem;">
                    <h2 class="fw-bold">Cuidar da saúde é um ato de amor próprio e coletivo.</h2>
                    <p>Adicione suas informações para fazer o <strong>Login.</strong></p>
                    <h1 class="logo text-center" style="width: 100px; margin-top: auto;"><a href="{{ route('register') }}"
                            style="color:#f7f9fc;">LA VIDA</a></h1>
                </div>

                <!-- Right Section -->
                <div class="col-md-8 d-flex flex-column align-items-center justify-content-center" style="padding: 40px;">
                    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data"
                        style="width: 100%; max-width: 400px;">
                        @csrf

                        <div class="mb-3">
                            <label for="nome" class="form-label">Número de telefone</label>
                            <input type="number" class="form-control" name="phone" min="0" id="number"
                                placeholder="Digite aqui o seu número" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">*Senha</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Digite aqui sua senha" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn w-100 fw-bold" style="background-color: #1985e4b6; color:#f7f9fc;">Entrar</button>
                        </div>                        

                        <div class="text-center mt-3">
                            <p>Não tens conta ?<a href="{{ route('register') }}" class="fcad">Criar</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
