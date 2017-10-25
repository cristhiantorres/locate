@extends('layouts.app')

@section('content')

<div class="uk-section-large">
  <div class="uk-container uk-container-large">
    <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
      <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"> </div>
      <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl">
        <div class="uk-card uk-card-default">
          <center>
            <h2>Iniciar Sesion</h2><br />
          </center>
          <form class="uk-card-body" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <fieldset class="uk-fieldset">
              <div class="uk-margin{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="uk-position-relative">
                  <span class="uk-form-icon" uk-icon="icon: user"></span>
                  <input id="email" type="email" placeholder="Correo Electronico" class="uk-input" name="email" value="{{ old('email') }}" required autofocus>

                  @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              
              <div class="uk-margin{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="uk-position-relative">
                  <span class="uk-form-icon" uk-icon="icon: lock"></span>
                  <input id="password" type="password" class="uk-input" name="password" placeholder="Contrasena" required>

                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              
              <div class="uk-margin">
                <div class="uk-position-relative">
                  <label><input type="checkbox" name="remember" class="uk-checkbox" {{ old('remember') ? 'checked' : '' }}> Recuérdame</label>
                </div>
              </div>
              
              <div class="uk-margin">
               <div class="uk-position-relative">
                <button type="submit" class="uk-button uk-button-primary">
                  <span uk-icon="icon: forward"></span>&nbsp; Iniciar
                </button>
              </div>
            </div>
          </fieldset>
        </form></div>
      </div>
      <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"> </div>
    </div>
  </div>
</div>
@endsection
