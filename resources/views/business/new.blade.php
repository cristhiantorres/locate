@extends('layouts.app')

@section('content')
<h2>Crear Empresa</h2>
@if (session('status'))
<div class="uk-alert">
  <a class="uk-alert-close" uk-close></a>
  {{ session('status') }}
</div>
@endif
<form method="POST" action="{{ route('businesses.store') }}" class="uk-grid-small" uk-grid>
  {{ csrf_field() }}
  <input name="user_id" type="hidden" value="{{ $user->id }}">
  <div class="uk-width-1-2@s">
    <label for="name" class="uk-form-label">Nombre</label>
    <input id="name" name="name" class="uk-input" type="text" required>
  </div>
  <div class="uk-width-1-2@s">
    <label for="email" class="uk-form-label">Correo</label>
    <input id="email" name="email" class="uk-input" type="email" required>
  </div>
  <div class="uk-width-1-2@s">
    <label for="phone" class="uk-form-label">Telefono</label>
    <input id="phone" name="phone" class="uk-input" type="text" required>
  </div>
  <div class="uk-width-1-2@s">
    <label for="address" class="uk-form-label">Direccion</label>
    <input id="address" name="address" class="uk-input" type="text" required>
  </div>
  <div class="uk-margin"><button class="uk-button uk-button-primary">Guardar</button></div>
  <div class="uk-margin"><a href="{{ url()->previous() }}" class="uk-button uk-button-secondary" uk-icon="icon: reply">Atras</a></div>
</form>
@endsection