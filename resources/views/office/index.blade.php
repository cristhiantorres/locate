@extends('layouts.app')

@section('content')
<div class="uk-placeholder">
  <h3>Oficinas de {{ $business->name }}</h3>
  <a href="{{ route('office.new',['id' => $business->id]) }}" class="uk-icon-button uk-button-primary" uk-icon="icon: plus"></a>
</div>
<div class="uk-grid-medium uk-child-width-1-3@s" uk-grid>
  @foreach ($offices as $office)
  <div>
    <div class="uk-card uk-card-default uk-card-body">
      <div class="uk-card-header">
        <div class="uk-grid-small" uk-grid>
          <div class="uk-width-expand">
            <h3 class="uk-card-title uk-margin-remove-bottom">{{ $office->name }}</h3>
            <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00"><span uk-icon="icon: calendar"></span>{{ date_format($office->created_at,'d-m-Y') }}</time></p>
          </div>
        </div>
      </div>
      <div class="uk-flex-middle" uk-grid>
        <div class="uk-width-1-1@m">
          <ul class="uk-card-body uk-list">
            <li><span uk-icon="icon: location"></span> {{ $office->address }}</li>
            <li><span uk-icon="icon: phone" ></span> {{ $office->phone }}</li>
            <li><span uk-icon="icon: mail" ></span> {{ $office->email }}</li>
          </ul>
        </div>
        <div class="uk-width-1-1@m uk-flex-first">
          <img src="/img/default.png" alt="Image">
        </div>
      </div>
      <div class="uk-card-footer">
        <a href="{{ route('products.index',['id' => $office->id]) }}" class="uk-button uk-button-text" title="Productos"><span uk-icon="icon: cart"></span>{{ $office->products()->count() }}</a>
        <div style="float: right;">
          <a href="{{ route('products.new', ['id' => $office->id ]) }}" title="Agregar Productos" class="uk-icon-link uk-margin-small-right" uk-icon="icon: plus"></a>
          <a href="#modal-office-{{ $office->id }}" title="Editar" class="uk-icon-link uk-margin-small-right" uk-icon="icon: file-edit" uk-toggle></a>
          
          <a onclick="event.preventDefault();document.getElementById('destroy-office-{{ $office->id }}').submit();" title="Eliminar" class="uk-icon-link" uk-icon="icon: trash"></a>
          <form id="destroy-office-{{ $office->id }}" method="POST" action="{{ route('office.destroy', ['id' => $office->id ]) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('office.modal-edit')
  @endforeach
</div>
@endsection