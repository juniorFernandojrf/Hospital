@extends('PClinico.Recepcionista.layout.master_admin')
@section('sessao_admin')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">Cadastro de Paciente</h4>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title">Formulário de Cadastro</h4>
                        </div>
                        <div class="card-body">
                            <form id="registrationForm" action="{{ route('register_utente')}}" method="POST" class="p-3">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Nome Completo</label>
                                        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Informe seu Nome" value="{{ old('nome') }}" required>
                                        @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">E-mail</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Informe seu E-mail" value="{{ old('email') }}" required>
                                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Senha</label>
                                        <input type="password" class="form-control @error('senha') is-invalid @enderror" name="senha" placeholder="Informe sua Senha" required>
                                        @error('senha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Confirmar Senha</label>
                                        <input type="password" class="form-control @error('senha_confirmation') is-invalid @enderror" name="senha_confirmation" placeholder="Confirme sua Senha" required>
                                        @error('senha_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Telefone</label>
                                        <input type="tel" class="form-control @error('telefone') is-invalid @enderror" name="telefone" placeholder="Informe seu Telefone" value="{{ old('telefone') }}" required>
                                        @error('telefone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Morada</label>
                                        <input type="text" class="form-control @error('morada') is-invalid @enderror" name="morada" placeholder="Informe sua Morada" value="{{ old('morada') }}" required>
                                        @error('morada')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Código Postal</label>
                                        <input type="text" class="form-control @error('codigoPostal') is-invalid @enderror" name="codigoPostal" placeholder="Informe o Código Postal" value="{{ old('codigoPostal') }}" required>
                                        @error('codigoPostal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Data de Aniversário</label>
                                        <input type="date" class="form-control @error('dataAnivers') is-invalid @enderror" name="dataAnivers" value="{{ old('dataAnivers') }}" required>
                                        @error('dataAnivers')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Sexo</label>
                                        <select class="form-select @error('sexo') is-invalid @enderror" name="sexo" required>
                                            <option value="" disabled selected>Selecione</option>
                                            <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="Feminino" {{ old('sexo') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                                        </select>
                                        @error('sexo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Estado Civil</label>
                                        <select class="form-select @error('estadoCivil') is-invalid @enderror" name="estadoCivil" required>
                                            <option value="" disabled selected>Selecione</option>
                                            <option value="Solteiro" {{ old('estadoCivil') == 'Solteiro' ? 'selected' : '' }}>Solteiro</option>
                                            <option value="Casado" {{ old('estadoCivil') == 'Casado' ? 'selected' : '' }}>Casado</option>
                                            <option value="Divorciado" {{ old('estadoCivil') == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                                            <option value="Viúvo" {{ old('estadoCivil') == 'Viúvo' ? 'selected' : '' }}>Viúvo</option>
                                        </select>
                                        @error('estadoCivil')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-4">
                                        <label for="inputLocation" class="form-label fw-semibold">Localização</label>
                                        <input type="text" class="form-control @error('localizacao') is-invalid @enderror"
                                            id="inputLocation" name="localizacao" placeholder="Informe sua Localização"
                                            value="{{ old('localizacao') }}" required>
                                        @error('localizacao')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
        
                                    <div class="col-md-4">
                                        <label for="inputFinancialEntity" class="form-label fw-semibold">Seguradora</label>
                                        <input type="text"
                                            class="form-control @error('entidadeFinanceira') is-invalid @enderror"
                                            id="inputFinancialEntity" name="entidaFinance"
                                            placeholder="Informe a Entidade Financeira" value="{{ old('entidaFinance') }}">
                                        @error('entidaFinance')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
        
                                    <div class="col-md-4">
                                        <label for="inputUserNumber" class="form-label fw-semibold">Número Seguradora</label>
                                        <input type="text" class="form-control @error('numSegura') is-invalid @enderror"
                                            id="inputUserNumber" name="numSegura" placeholder="Informe o Número de Utente"
                                            value="{{ old('numSegura') }}">
                                        @error('numSegura')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary w-100 fw-bold">Criar Conta</button>
                                </div>
                                <div class="text-center mt-3">
                                    <p>Já tem uma conta? <a href="{{ route('login') }}" class="text-primary">Entrar</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
