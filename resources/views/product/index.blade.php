@extends('layouts.app')

@section('content')
<div class="uk-placeholder">
  <h2>Porductos de - {{ $office->name }}</h2>
  <p>Estos productos apareceran como productos en promocion</p>
  <a href="{{ route('products.new',['id' => $office->id]) }}" class="uk-icon-button uk-button-primary" uk-icon="icon: plus"></a>
  <a href="{{ url()->previous() }}" class="uk-icon-button uk-button-secondary" uk-icon="icon: reply"></a>
</div>
@if (session('status'))
<div class="uk-alert">
  <a class="uk-alert-close" uk-close></a>
  {{ session('status') }}
</div>
@endif

<div class="uk-card uk-card-default uk-card-body">
  <table class="uk-table uk-table-middle">
    <thead>
      <tr>
        <th class="uk-width-small">Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}</td>
        <td>
          <a href="#" title="Editar" class="uk-icon-link uk-margin-small-right" uk-icon="icon: file-edit"></a>
          <a onclick="event.preventDefault();document.getElementById('destroy-product-{{ $product->id }}').submit();" title="Eliminar" class="uk-icon-link" uk-icon="icon: trash"></a>
          <form id="destroy-product-{{ $product->id }}" method="POST" action="{{ route('businesses.destroy', ['id' => $product->id ]) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection