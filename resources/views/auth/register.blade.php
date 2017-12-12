@extends('layouts.app')

@section('content')
<div class="uk-section-large">
  <div class="uk-container uk-container-large">
    <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
      <div class="uk-width-1-1@s uk-width-1-3@l uk-width-1-3@xl"></div>
      <div class="uk-width-1-1@s uk-width-1-3@l uk-width-1-3@xl">
        <div class="uk-card uk-card-default">
          <center><h2>Registrate</h2></center>
          <div class="uk-card-body">
            <form method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}

              <fieldset class="uk-fieldset">
                <div class="uk-margin{{ $errors->has('name') ? ' has-error' : '' }}">
                  <div class="uk-position-relative">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input id="name" type="text" placeholder="Nombre" class="uk-input" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="uk-margin{{ $errors->has('email') ? ' has-error' : '' }}">

                  <div class="uk-position-relative">
                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                    <input id="email" type="email" placeholder="Correo" class="uk-input" name="email" value="{{ old('email') }}" required>

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
                    <input id="password" type="password" placeholder="Contrasena" class="uk-input" name="password" required>

                    @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="uk-margin">

                  <div class="uk-position-relative">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="password-confirm" type="password" class="uk-input" name="password_confirmation" placeholder="Confirmar contransena" required>
                  </div>
                </div>

                <div class="uk-margin">
                  <div class="uk-position-relative col-md-offset-4">
                    <button type="submit" class="uk-button uk-button-primary">
                      <span uk-icon="icon: check"></span>&nbsp; Registrate
                    </button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
      <div class="uk-width-1-1@s uk-width-1-3@l uk-width-1-3@xl"></div>
    </div>
  </div>
</div>
@endsection
