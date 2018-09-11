@extends('layouts.cliente')

@section('content')

<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
  <div class="form-group{{ $errors->has('pNombres') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="pNombres" type="text" class="form-control" name="pNombres" value="{{ old('pNombres') }}" required autofocus>
    <label class="floating-label">Nombre</label>
    @if ($errors->has('pNombres'))
        <span class="help-block">
            <strong>{{ $errors->first('pNombres') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group{{ $errors->has('pApellidoPaterno') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="pApellidoPaterno" type="text" class="form-control" name="pApellidoPaterno" value="{{ old('pApellidoPaterno') }}" required>
    <label class="floating-label">Apellido Paterno</label>
    @if ($errors->has('pApellidoPaterno'))
        <span class="help-block">
            <strong>{{ $errors->first('pApellidoPaterno') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group{{ $errors->has('pApellidoMaterno') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="pApellidoMaterno" type="text" class="form-control" name="pApellidoMaterno" value="{{ old('pApellidoMaterno') }}" required>
    <label class="floating-label">Apellido Materno</label>
    @if ($errors->has('pApellidoMaterno'))
        <span class="help-block">
            <strong>{{ $errors->first('pApellidoMaterno') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group{{ $errors->has('pDNI') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="pDNI" type="text" class="form-control" name="pDNI" value="{{ old('pDNI') }}" required>
    <label class="floating-label">DNI</label>
    @if ($errors->has('pDNI'))
        <span class="help-block">
            <strong>{{ $errors->first('pDNI') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group{{ $errors->has('pCorreoE') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="pCorreoE" type="email" class="form-control" name="pCorreoE" value="{{ old('pCorreoE') }}" required>
    <label class="floating-label">Correo</label>
    @if ($errors->has('pCorreoE'))
        <span class="help-block">
            <strong>{{ $errors->first('pCorreoE') }}</strong>
        </span>
    @endif
  </div>
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="password" type="password" class="form-control" name="password" required>
    <label class="floating-label">Contraseña</label>
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
  </div>
  <div class="form-group form-material floating" data-plugin="formMaterial">
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    <label class="floating-label">Verificar contraseña</label>
  </div>

  <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Registraté</button>
</form>
<p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Ingresar</a></p>
{{-- <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a> --}}
@endsection