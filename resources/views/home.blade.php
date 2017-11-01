@extends('layouts.app')

@section('content')
<h3>Mis empresas</h3>
<div class="uk-margin">
  <a href="{{ route('businesses.create') }}" class="uk-icon-button" uk-icon="icon: plus"></a>
</div>
@if (session('status'))
<div class="uk-alert">
  <a class="uk-alert-close" uk-close></a>
  {{ session('status') }}
</div>
@endif
<div class="uk-grid-medium uk-child-width-1-3@s" uk-grid>
  @foreach ($businesses as $business)
  <div>
    <div class="uk-card uk-card-default uk-card-body">
      <div class="uk-card-header">
        <div class="uk-grid-small" uk-grid>
          <div class="uk-width-expand">
            <h3 class="uk-card-title uk-margin-remove-bottom">{{ $business->name }}</h3>
            <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00"><span uk-icon="icon: calendar"></span>{{ date_format($business->created_at,'d-m-Y') }}</time></p>
          </div>
        </div>
      </div>
      <ul class="uk-card-body uk-list">
        <li><span uk-icon="icon: location"></span> {{ $business->address }}</li>
        <li><span uk-icon="icon: phone" ></span> {{ $business->phone }}</li>
        <li><span uk-icon="icon: mail" ></span> {{ $business->email }}</li>
      </ul>
      <div class="uk-card-footer">
        <a href="{{ route('office.index',['id' => $business->id]) }}" class="uk-button uk-button-text" title="Oficinas"><span uk-icon="icon: location"></span>{{ $business->offices()->count() }}</a>
        <div style="float: right;">
          <a href="{{ route('office.new', ['id' => $business->id ]) }}" title="Agregar officina" class="uk-icon-link uk-margin-small-right" uk-icon="icon: plus"></a>
          {{-- <a href="{{ route('businesses.edit',['id' => $business->id]) }}" title="Editar" class="uk-icon-link uk-margin-small-right" uk-icon="icon: file-edit"></a> --}}
          <a href="#modal-business-{{ $business->id }}" title="Editar" class="uk-icon-link uk-margin-small-right" uk-icon="icon: file-edit" uk-toggle></a>
          <a onclick="event.preventDefault();document.getElementById('destroy-business-{{ $business->id }}').submit();" title="Eliminar" class="uk-icon-link" uk-icon="icon: trash"></a>
          <form id="destroy-business-{{ $business->id }}" method="POST" action="{{ route('businesses.destroy', ['id' => $business->id ]) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
          </form>
        </div>
      </div>
    </div>
  </div>
  @include('business.modal-edit')
  @endforeach
</div>
@endsection
