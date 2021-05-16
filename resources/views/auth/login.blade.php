@extends('layouts.default')

@section('content')

<img class="img-background" src="https://th.bing.com/th/id/Re606089e15d185b2d61bb29ebf85fcc2?rik=IfQt64PPwmqUbw&riu=http%3a%2f%2fwww.miguelservetsc.es%2fwp-content%2fuploads%2f2013%2f02%2fcentro-optico-ver-mas-2.jpg&ehk=OiDuvpP8kGWErWHcDXu0AdayFfmXd002w1FYb%2fDh68g%3d&risl=&pid=ImgRaw" alt="">

<div class="login-container">
    <div class="login-content">
        <p class="text-center">
            <img src="https://i.ibb.co/KmP97HN/Captura.png" alt="Captura" border="0" width="200px">
        </p>
        <p class="text-center">
            Inicia sesión con tu cuenta
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="username" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp; Nombre de Usuario</label>
                <input  id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" maxlength="35" >
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >
            </div>
            <button type="submit" class="btn-login text-center">{{ __('Login') }}</button>
        </form>
    </div>
</div>
@endsection
