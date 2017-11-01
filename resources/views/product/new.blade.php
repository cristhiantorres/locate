@extends('layouts.app')

@section('content')
<div class="uk-placeholder uk-text-center">
  <h2>Crear producto - {{ $office->name }}</h2>
  <p>Estos productos que vas cargando apareceran como productos en promocion</p>
</div>
@if (session('status'))
<div class="uk-alert">
  <a class="uk-alert-close" uk-close></a>
  {{ session('status') }}
</div>
@endif
<form method="POST" action="{{ route('products.create') }}" class="uk-grid-small" uk-grid>
  {{ csrf_field() }}
  <input name="office_id" type="hidden" value="{{ $office->id }}">
  <div class="uk-width-1-2@s">
    <label for="name" class="uk-form-label">Nombre</label>
    <input id="name" name="name" class="uk-input" type="text" required>
  </div>
  <div class="uk-width-1-2@s">
    <label for="price" class="uk-form-label">Precio</label>
    <input id="price" name="price" class="uk-input" type="number" required>
  </div>
  <div class="uk-width-1-2@s">
    <label for="description" class="uk-form-label">Descripcion</label>
    <textarea name="description" id="description" class="uk-textarea" cols="30" rows="10"></textarea>
  </div>
  <div class="uk-margin"><button class="uk-button uk-button-primary">Guardar</button></div>
  <div class="uk-margin"><a href="{{ url()->previous() }}" class="uk-button uk-button-secondary" uk-icon="icon: reply">Atras</a></div>
</form>
@endsection