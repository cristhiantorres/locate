@extends('layouts.app')

@section('content')

<div class="uk-placeholder">

  <h2>Porductos de - {{ $office->name }}</h2>

  <p>Estos productos apareceran como productos en promocion</p>

  <a href="{{ route('products.new',['id' => $office->id]) }}" class="uk-icon-button uk-button-primary" uk-icon="icon: plus"></a>

  <a href="{{ url()->previous() }}" class="uk-icon-button uk-button-secondary" uk-icon="icon: reply"></a>

</div>


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

      @include('product.modal-edit')

      <tr>

        <td>{{ $product->name }}</td>

        <td>{{ $product->description }}</td>

        <td>{{ $product->price }}</td>

        <td>

         <a href="#modal-product-{{ $product->id }}" title="Editar" class="uk-icon-link uk-margin-small-right" uk-icon="icon: file-edit" uk-toggle></a>

         <a onclick="event.preventDefault();document.getElementById('destroy-product-{{ $product->id }}').submit();" title="Eliminar" class="uk-icon-link" uk-icon="icon: trash"></a>

         <form id="destroy-product-{{ $product->id }}" method="POST" action="{{ route('products.destroy', ['id' => $product->id ]) }}">

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