
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex  align-items-center">        
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">sis@gmail.com</a>
        <i class="bi bi-phone"></i> +244 9xx xxx xxx
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="{{ route('login') }}" > Inciar </a>
        <div class="mt-2 p-1"></div>
        <a href="{{ route('register') }}"> Cadastrar </a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">LA VIDA</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ route('inicio') }}">Página Inicial</a></li>
          <li><a class="nav-link scrollto" href="#about">Quem somos</a></li>
          <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
          <li><a class="nav-link scrollto" href="#departments">Especialidades</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctores</a></li>          
          <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{ route('marcacao') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline ">Fazer </span> Marcação</a>

    </div>
  </header><!-- End Header -->