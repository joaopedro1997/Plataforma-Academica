@extends('layouts.appp')
@section('titulo')
    Criar nova conta
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criar nova conta') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Completo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Endereço de E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('O que você é') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select" name="type" id="type" >
                                    <option>Estudante</option>
                                    <option>Professor</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Curso') }}</label>
                            <div class="col-md-6">
                                <select class="custom-select" name="course" id="" >
                                    <option>Administração</option>
                                    <option>Arquitetura e urbanismo</option>
                                    <option>Biomedicina</option>
                                    <option>Direito</option>
                                    <option>Educação Fisica</option>
                                    <option>Engenharia</option>
                                    <option>Enfermagem</option>
                                    <option>Engenharia Mecatrônica</option>
                                    <option>Farmácia</option>
                                    <option>Fisioterapia</option>
                                    <option>Gastronomia</option>
                                    <option>Medicína veterinária</option>
                                    <option>Sistemas de Informação</option>
                                    <option>Nutrição</option>
                                    <option>Odontologia</option>
                                    <option>Psicologia</option>
                                    <option>Publicidade e Propaganda</option>
                                </select>
                            </div>

                        </div><div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Matéria') }}</label>
                            <div class="col-md-6">
                                <select class="custom-select" name="matter" id="type" >
                                    <option>TID</option>
                                    <option>TCC</option>
                                    <option>Projeto de Pesquisa</option>
                                    <option>Portugues</option>
                                    <option>Matematica</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Criar conta') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
