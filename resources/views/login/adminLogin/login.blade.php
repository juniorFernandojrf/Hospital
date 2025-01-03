@extends('login.adminLogin.masterLogin')
@section('titulo', 'Login')
@section('Form')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <h1 class="logo me-auto"><a href="#">LA VIDA</a></h1>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Entre na sua conta</h5>
                                        <p class="text-center small">Digite seu email de usuário e senha para fazer login
                                        </p>
                                    </div>

                                    <form class="row g-3 needs-validation" action="{{ route('admin.login') }}" method="POST" enctype="multipart/form-data">

                                        <div class="col-12">
                                            <label for="inputEmail" class="form-label">E-mail</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="inputEmail" name="email" placeholder="Informe seu E-mail"
                                                value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="inputPassword" class="form-label">Senha</label>
                                            <input type="password" class="form-control @error('senha') is-invalid @enderror"
                                                id="inputPassword" name="senha" placeholder="Informe sua Senha" required>
                                            @error('senha')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>

                                        <div class="col-12">
                                            
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

@endsection
