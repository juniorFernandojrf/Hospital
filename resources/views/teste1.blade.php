<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('titulo')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assets/css/sig.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Medilab - v4.6.0
    * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- Multi Columns Form -->
{{-- <div class="d-flex align-items-center justify-content-center" style="background-color: #f7f9fc; min-height: 100vh;">
    <div class="container p-4 bg-white shadow rounded" style="max-width: 1110px; width: 100%;">
        <div class="row g-0">
            <!-- Left Section -->
            <div class="col-md-3 text-white d-flex flex-column align-items-center justify-content-center" style="background-color: #2cc3c3; padding: 2rem;">
                <h2 class="fw-bold">Vamos começar a transformar seus planos em conquistas?</h2>
                <p>Adicione suas informações abaixo para criar uma conta.</p>
                <img src="your-logo-url.png" alt="Logo" style="width: 100px; margin-top: auto;">
            </div>

            <!-- Right Section -->
            <div class="col-md-9">
                <form class="p-2" id="registrationForm">
                    <!-- Row to align fields horizontally -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Nome Completo *</label>
                            <input type="text" class="form-control" id="inputName" name="nome" placeholder="Informe seu Nome" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputPhone" class="form-label">Telefone *</label>
                            <input type="tel" class="form-control" id="inputPhone" name="telefone" placeholder="Informe seu Telefone" pattern="\(\d{2}\) \d{4,5}-\d{4}" required>
                        </div>
                    </div>

                    <!-- New Row for additional fields -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="inputGender" class="form-label">Sexo *</label>
                            <select class="form-select" id="inputGender" name="sexo" required>
                                <option value="" selected disabled>Selecione</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="inputBirthday" class="form-label">Data de Aniversário *</label>
                            <input type="date" class="form-control" id="inputBirthday" name="dataAniversario" required>
                        </div>

                        <div class="col-md-4">
                            <label for="inputMaritalStatus" class="form-label">Estado Civil *</label>
                            <select class="form-select" id="inputMaritalStatus" name="estadoCivil" required>
                                <option value="" selected disabled>Selecione</option>
                                <option value="Solteiro">Solteiro</option>
                                <option value="Casado">Casado</option>
                                <option value="Divorciado">Divorciado</option>
                                <option value="Viúvo">Viúvo</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">E-mail *</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Informe seu Email" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Criar Conta</button>
                    </div>

                    <p class="text-center mt-3">Ao criar a conta, você concorda com os <a href="#">Termos de uso</a> e com a <a href="#">Política de Privacidade</a>.</p>
                </form>
            </div>
        </div>
    </div>
</div> --}}



{{-- <script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        const financialEntity = document.getElementById('inputFinancialEntity').value;
        const userNumber = document.getElementById('inputUserNumber').value;

        if (financialEntity && !userNumber) {
            event.preventDefault();
            alert('Por favor, preencha o número de utente se informar a entidade financeira responsável.');
        }

        const password = document.getElementById('inputPassword').value;
        const confirmPassword = document.getElementById('inputConfirmPassword').value;

        if (password !== confirmPassword) {
            event.preventDefault();
            alert('As senhas não coincidem. Por favor, verifique e tente novamente.');
        }
    });
</script> --}}


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Multi Columns Form</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Nome Com</label>
                    <input type="email" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label">Email</label>
                    <input type="password" class="form-control" id="inputPassword5">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Senha</label>
                    <input type="email" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label">confSenha</label>
                    <input type="password" class="form-control" id="inputPassword5">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">telefo</label>
                    <input type="email" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label">morada</label>
                    <input type="password" class="form-control" id="inputPassword5">
                </div>

                <div class="col-md-4">
                    <label for="inputState" class="form-label">dateAniv</label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">sexo</label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Estado Civil</label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Loca</label>
                    <input type="email" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label">codPo</label>
                    <input type="password" class="form-control" id="inputPassword5">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Segurad</label>
                    <input type="email" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label">N segura</label>
                    <input type="password" class="form-control" id="inputPassword5">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                

            </form><!-- End Multi Columns Form -->

        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/assets/js/main.js') }}"></script>

</body>

</html>
