@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Ingresar')])
<title>Ingresar</title>
@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3>{{ __('Inicie sesión para poder registrar tipos de cambio y acceder a mas caracteristicas') }} </h3>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center" style="background: linear-gradient(60deg, #4768bc, #2450aa);">
            <h4 class="card-title"><strong>{{ __('Ingresar') }}</strong></h4>
          </div>
          <div class="card-body">
            <p class="card-description text-center">{{ __('Ingresa con tu correo ') }} <strong>admin@material.com</strong> {{ __(' y contraseña ') }}<strong>*****</strong> </p>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('ejemplo@ejemplo.com') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember',1) ? 'checked' : '' }}> {{ __('Recuerdame') }}
                <span class="form-check-sign" >
                  <span class="check" style="background: #2450aa;"></span>
                </span>
              </label>
            </div>
          </div>
         
          <div class="card-footer justify-content-center">
            <button onclick= "refreshPage()" type="submit" class="btn btn-primary btn-link btn-lg" style="color: #2450aa;">{{ __('Ingresar') }}</button>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-6">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-light">
                    <small>{{ __('¿Olvidó su contraseña?') }}</small>
                </a>
            @endif
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('register') }}" class="text-light">
                <small>{{ __('Crear nueva cuenta') }}</small>
            </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
