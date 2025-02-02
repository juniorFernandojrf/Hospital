@extends('Admin.layout.master_admin')
@section('sessao_admin')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4> Lista Especialidade </h4>
                <ol class="breadcrumb">

                    <li class="breadcrumb-item active"><a href="{{ route('pagina_inicial') }}">Voltar</a></li>
                </ol>
            </div>
            <!-- row -->
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Todas Especialidades </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nome</th>
                                            <th>Estado</th>
                                            <th>Data Da Criação </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- carregar todas as especialidade --}}
                                        @foreach ($dateEsp as $dado)
                                            <tr>
                                                <td><img class="rounded-circle" width="35"
                                                        src="images/profile/small/pic1.jpg" alt=""></td>
                                                <td> {{ $dado->nome }} </td>
                                                <td> {{ $dado->estado }} </td>
                                                <td> {{ $dado->created_at }} </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('especialidade_editar', $dado->id) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fa fa-pencil"></i></a><!-- Botão de remoção -->
                                                        <form action="{{ route('especialidade_destroy', $dado->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Tem certeza que deseja remover esta especialidade?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
