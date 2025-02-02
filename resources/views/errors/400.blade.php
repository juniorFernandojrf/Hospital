@extends('errors.master_admin')
@section('title', 'LA VIDA')
@section('sessao_admin')

<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="form-input-content text-center error-page">
                    <h1 class="error-text font-weight-bold">400</h1>
                    <h4><i class="fa fa-thumbs-down text-danger"></i> Requisição Inválida </h4>
                    <p>A requisição enviada não é válida. Por favor, revise os dados e tente novamente.</p>
                    {{-- <div>
                        <a class="btn btn-primary" href="{{ route('especialidade') }}">Voltar ao Inicio</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection