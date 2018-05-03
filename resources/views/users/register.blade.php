@extends('layouts.app')

@section('content')
    <div class="register-box">
  <div class="register-logo">
    Administración<br>
    <b>Bolivia </b>Corazón del Sur
  </div>
      <div class="register-box-body">
        <p class="login-box-msg">Registro Nuevo Usuario</p>
          @if (count($errors)>0)
            @foreach ($errors->all() as $error)
              <div class="alert alert-danger">
                {{ $error }}
              </div>
            @endforeach
          @endif
          <form  action="{{ route('register') }}" method="post">
                  @csrf
                <div class="form-group has-feedback {{ $errors->has('name')}}">
                  <input id='name' name='name' type="text" class="form-control{{ $errors->has('name') ? 'is-invalid' : ''}}" value='{{ old('name')}}' placeholder="Nombre">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input id='nick_name' name='nick_name' type="text" class="form-control" placeholder="Nombre de Usuario">
                  <span class="glyphicon glyphicon-king form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input id='email' name='email' type="email" class="form-control" placeholder="Email">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input id='password' name='password' type="password" class="form-control" placeholder="Contraseña">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input id='password-confirm' name='password-confirmation' type="password" class="form-control" placeholder="Repetir Contraseña" required>
                  <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-xs-8">
                    <div class="checkbox icheck">
                      <label>
                        <input type="checkbox"> I agree to the <a href="#">terms</a>
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                  </div>
                  <!-- /.col -->
                </div>
          </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
            Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
            Google+</a>
        </div>

        <a href="login.html" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div>
@endsection
