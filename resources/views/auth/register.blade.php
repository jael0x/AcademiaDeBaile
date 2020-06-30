@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-content">
                <div class="card-title">{{ __('Registro de Administrador') }}</div>
                @if ($errors->any())
                <h6 class="red-text">Por favor corrija los siguientes errores:</h6>
                @endif
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="input-field">
                            <label for="name">{{ __('Nombre') }}</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span id="mname" class="helper-text red-text">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="username">{{ __('Username') }}</label>
                            <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
                            @if ($errors->has('username'))
                                <span id="musername" class="helper-text red-text">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span id="memail" class="helper-text red-text">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="password">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" name="password" required>
                            @if ($errors->has('password'))
                                <span id="mpassword" class="helper-text red-text">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="password-confirm">{{ __('Confirme Contraseña') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn waves-effect waves-light">{{ __('Registrar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
