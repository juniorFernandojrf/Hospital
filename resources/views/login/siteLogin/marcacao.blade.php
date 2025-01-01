@extends('layout.site.master')
@section('titulo', 'SIS')
@section('content')

  <!-- ======= Appointment Section ======= -->
  <section id="appointment" class="appointment section-bg">
      <div class="container">

          <div class="section-title">
              <h2>Fazer marcação</h2>
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                  consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                  fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          {{-- <form action="{{ route('login.marcacao') }}" method="POST" enctype="multipart/form-data"> --}}
          @csrf
          <div class="mb-3 row">
              <div class="col">
                  <label for="nome" class="form-label">Nome</label>
                  <input type="text" class="form-control" name="name" placeholder="Seu Nome" required>
              </div>
              <div class="col">
                  <label for="sobrenome" class="form-label">Sobrenome</label>
                  <input type="text" class="form-control" name="lasteName" placeholder="Sobrenome" required>
              </div>
          </div>

          <div class="mb-3 row">
              <div class="col">
                  <label for="morada" class="form-label">Morada</label>
                  <input type="text" class="form-control" name="morada" placeholder="Morada" required>
              </div>
              <div class="col">
                  <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                  <input type="date" class="form-control" name="dateNasc" required>
              </div>

          </div>

          <div class="mb-3 row">
              <div class="col">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
              </div>
              <div class="col">
                  <label for="codigoPostal" class="form-label">Código Postal</label>
                  <input type="text" class="form-control" name="postCode" placeholder="Código Postal">
              </div>
          </div>

          <div class="mb-3 row">
              <div class="col">
                  <label for="telefone" class="form-label">Telefone</label>
                  <input type="tel" class="form-control" name="number" placeholder="Telefone" required>
              </div>
              <div class="col">
                  <label for="localidade" class="form-label">Localidade</label>
                  <input type="text" class="form-control" name="localate" placeholder="Localidade" required>
              </div>
          </div>

          <div class="mb-3 row">
              <div class="col">
                  <label for="codigoPostal" class="form-label">Data da marcação</label>
                  <input type="date" class="form-control" name="dataMarc" placeholder="Data da marcação">
              </div>
              <div class="col">
                  <label for="codigoPostal" class="form-label">Especialidades</label>
                  <select name="name" id="department" class="form-select">
                      <option value="">Especialidades</option>
                      <option value="Cardiologia">Cardiologia</option>
                      <option value="Neurologia">Neurologia</option>
                      <option value="Hepatologia">Hepatologia</option>
                      <option value="Pneumologia">Pneumologia</option>
                      <option value="Endocrinologia">Endocrinologia</option>
                  </select>
                  <div class="validate"></div>
              </div>
          </div>

          <div class="mb-3 form-check">
              <input class="form-check-input" type="checkbox" id="possuiSeguradoraCadastro">
              <label class="form-check-label" for="possuiSeguradoraCadastro">Possui Seguradora</label>
          </div>

          <div id="dadosSeguradoraCadastro" style="display: none;" class="row">
              <div class="col-md-6 mb-3">
                  <label for="seguradoraCadastro" class="form-label">Seguradora</label>
                  <input type="text" class="form-control" name="segure" placeholder="Nome da Seguradora">
              </div>

              <div class="col-md-6 mb-3">
                  <label for="numeroSeguroCadastro" class="form-label">Número do Seguro</label>
                  <input type="text" class="form-control" name="segureNumber" placeholder="Número do Seguro">
              </div>
          </div>
          <div class="mb-3">
              <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"
                  placeholder="Escreva aqui de forma resumida o que sente"></textarea>
          </div>
          <div class="col-md-2 mb-3 offset-sm-5">
              <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
          </div>
          {{-- </form> --}}
      </div>
      </div>
      </div>

      </div>
  </section><!-- End Appointment Section -->

@endsection