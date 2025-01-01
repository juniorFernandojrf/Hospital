@extends('../admin.masterAdmin')
@section('titulo','Admin-criar')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom">
      
        <form action="" method="POST">
            @csrf
            <div class="mb-3 row">
                <div class="col">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Seu Nome">
                </div>
                <div class="col">
                    <label for="sobrenome" class="form-label">Sobrenome</label>
                    <input type="text" class="form-control" id="sobrenome" placeholder="Sobrenome">
                </div>
                <div class="col">
                    <label for="sobrenome" class="form-label">Morada</label>
                    <input type="text" class="form-control" id="sobrenome" placeholder="Sobrenome">
                </div>
                 <div class="col">
                    <label for="morada" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="morada" placeholder="Morada">
                </div> 
            </div>
        
            <div class="mb-3 row">
               
                <div class="col">
                    <label for="telefone" class="form-label">Data de Nascimento</label>
                    <input type="tel" class="form-control" id="telefone" placeholder="Telefone">
                </div>
            </div>
        
            <div class="mb-3 row">
                <div class="col">
                    <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="dataNascimento">
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
        
            <div class="mb-3 row">
                <div class="col">
                    <label for="codigoPostal" class="form-label">Código Postal</label>
                    <input type="text" class="form-control" id="codigoPostal" placeholder="Código Postal">
                </div>
                <div class="col">
                    <label for="localidade" class="form-label">Localidade</label>
                    <input type="text" class="form-control" id="localidade" placeholder="Localidade">
                </div>
            </div>
        
            <div id="dadosSeguradoraCadastro" style="display: none;" class="row">
                <div class="col-md-6 mb-3">
                    <label for="seguradoraCadastro" class="form-label">Seguradora</label>
                    <input type="text" class="form-control" id="seguradoraCadastro" placeholder="Nome da Seguradora">
                </div>
        
                <div class="col-md-6 mb-3">
                    <label for="numeroSeguroCadastro" class="form-label">Número do Seguro</label>
                    <input type="text" class="form-control" id="numeroSeguroCadastro" placeholder="Número do Seguro">
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary w-100">Submeter</button>
        </form>

    </div>   
</main>  
 
@endsection