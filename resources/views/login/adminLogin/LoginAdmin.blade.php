@extends('login.adminLogin.masterLogin')
@section('titulo','Login')
@section('Form')

<div class="col-sm-4 offset-sm-4 p-8 ">        
  <div class="card3">
    <div class="card-body">

        <h1 class="logo me-auto t"><a href="{{route('index')}}" >SIS</a></h1>       
        <h5 class="text-center mb-4">Login</h5>

        <form action="{{route('login.auth')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">E-mail</label>
                <input type="number" class="form-control" name="number" min="0" id="number" placeholder="Digite aqui o seu numero ">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Senha</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Digite aqui o sua senha">
            </div>
            
              <div class="checkbox mb-3 d-flex justify-content-between">
                <label><input type="checkbox" value="remember-me"> Lembrar-me </label>
                <p><a href="#"> Esqueci a senha ! </a> </p>
              </div>            

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
            <div class="row">
              <div class="d-flex ">
                <p>Não tem uma conta?</p>
                <a href="{{route('login.register')}}" class="fcad"> Cadastrar-se </a>
              </div>
            </div>
            
        </form>

    </div>
  </div>                  
</div>  


 @endsection
     
    
     