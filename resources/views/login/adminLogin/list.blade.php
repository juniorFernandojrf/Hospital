@extends('../admin.masterAdmin')
@section('titulo','Admin-criar')
@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Lista de Usuários</h1>
    <ul class="list-group">
        <!-- Usuário 1 -->
        <li class="list-group-item">
            <div class="row">
                <div class="col">
                    <h5>João Silva</h5>
                </div>
                <div class="col">
                    <p>Morada: Rua A, 123</p>
                </div>
                <div class="col">
                    <p>Telefone: (123) 456-7890</p>
                </div>
                <div class="col">
                    <p>Data de Nascimento: 01/01/1990</p>
                </div>
                <div class="col">
                    <p>Email: joao@example.com</p>
                </div>
                <div class="col"> 
                    <button class="btn btn-primary" onclick="editarUsuario(1)">Editar</button>
                    <button class="btn btn-danger me-2" onclick="excluirUsuario(1)">Excluir</button>                   
                </div>
            </div>
        </li>
        <!-- Usuário 2 -->
        <li class="list-group-item">
            <div class="row">
                <div class="col">
                    <h5>Maria Souza</h5>
                </div>
                <div class="col">
                    <p>Morada: Av. B, 456</p>
                </div>
                <div class="col">
                    <p>Telefone: (987) 654-3210</p>
                </div>
                <div class="col">
                    <p>Data de Nascimento: 05/05/1985</p>
                </div>
                <div class="col">
                    <p>Email: maria@example.com</p>
                </div>
                <div class="col">
                    <button class="btn btn-primary" onclick="editarUsuario(2)">Editar</button>
                    <button class="btn btn-danger me-2" onclick="excluirUsuario(2)">Excluir</button>                    
                </div>
            </div>
        </li>
        <!-- Adicione mais usuários conforme necessário -->
    </ul>
</div>


 
@endsection