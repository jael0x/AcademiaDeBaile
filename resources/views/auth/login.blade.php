@extends('admin.login')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-content">
                <div class="card-title">{{ __('Ingreso solo para Administradores') }}</div>
                    @if ($errors->any())
                    <h6 class="red-text">Por favor corrija los siguientes errores:</h6>
                        @if ($errors->has('username') || $errors->has('email'))
                            <span id="mlogin" class="helper-text red-text">{{ $errors->first('username') ?: $errors->first('email') }}</span>
                        @endif
                        @if ($errors->has('password'))
                        <span id="mpassword" class="helper-text red-text">{{ $errors->first('password') }}</span>
                        @endif
                    @endif
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="input-field">
                            <label for="login">{{ __('Username o Email') }}</label>
                            <input id="login" type="text" name="login" value="{{ old('username') ?: old('email') }}" required autofocus>
                        </div>

                        <div class="input-field">
                            <label for="password" class="">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" name="password" required>
                        </div>

                        <button type="submit" class="btn waves-effect waves-light">{{ __('Ingresar') }}</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
