@extends('layouts.app')

@section('content')
<h2>Editar Empresa</h2>

<form method="POST" action="{{ route('businesses.update',['id' => $business->id]) }}" class="uk-grid-small" uk-grid>

  {{ csrf_field() }}
  {{ method_field('PATCH') }}
  
  <div class="uk-width-1-2@s">

    <label for="name" class="uk-form-label">Nombre</label>

    <input id="name" name="name" class="uk-input" type="text" value="{{ $business->name }}" required>

  </div>

  <div class="uk-width-1-2@s">

    <label for="email" class="uk-form-label">Correo</label>

    <input id="email" name="email" class="uk-input" type="email" value="{{ $business->email}}" required>

  </div>

  <div class="uk-width-1-2@s">

    <label for="phone" class="uk-form-label">Telefono</label>

    <input id="phone" name="phone" class="uk-input" type="text" value="{{ $business->phone }}" required>

  </div>

  <div class="uk-width-1-2@s">

    <label for="address" class="uk-form-label">Direccion</label>

    <input id="address" name="address" class="uk-input" type="text" value="{{ $business->address }}" required>
    
  </div>
  
  <div class="uk-margin"><button class="uk-button uk-button-primary">Guardar</button></div>
  
  <div class="uk-margin">
    
    <a href="{{ url()->previous() }}" class="uk-button uk-button-secondary" uk-icon="icon: reply">Atras</a>

  </div>

</form>
@endsection