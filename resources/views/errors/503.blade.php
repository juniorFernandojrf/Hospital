@extends('errors.master_admin')
@section('title', 'LA VIDA')
@section('sessao_admin')

    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text font-weight-bold">503</h1>
                        <h4><i class="fa fa-times-circle text-danger"></i>Serviço Indisponível</h4>
                        <p>O serviço está temporariamente indisponível. Por favor, tente novamente em breve.</p>
                        {{-- <div>
                            <a class="btn btn-primary" href="{{ route('especialidade') }}">Voltar ao Inicio</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
