<div id="modal-office-{{ $office->id }}" uk-modal>
  
  <div class="uk-modal-dialog">
    
    <button class="uk-modal-close-default" type="button" uk-close></button>
    
    <div class="uk-modal-header">
      
      <h2 class="uk-modal-title">Editar {{ $office->name }}</h2>
      
    </div>
    
    <div class="uk-modal-body">
      
      <form method="POST" action="{{ route('office.update',['id' => $office->id]) }}" id="form-update-{{ $office->id }}" class="uk-grid-small" uk-grid>
        
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        
        <div class="uk-width-1-2@s">
          
          <label for="name" class="uk-form-label">Nombre</label>
          
          <input id="name" name="name" class="uk-input" type="text" value="{{ $office->name }}" required>
          
        </div>
        
        <div class="uk-width-1-2@s">
          
          <label for="email" class="uk-form-label">Correo</label>
          
          <input id="email" name="email" class="uk-input" type="email" value="{{ $office->email}}" required>
          
        </div>
        
        <div class="uk-width-1-2@s">
          
          <label for="phone" class="uk-form-label">Telefono</label>
          
          <input id="phone" name="phone" class="uk-input" type="text" value="{{ $office->phone }}" required>
          
        </div>
        
        <div class="uk-width-1-2@s">
          
          <label for="address" class="uk-form-label">Direccion</label>
          
          <input id="address" name="address" class="uk-input" type="text" value="{{ $office->address }}" required>
          
        </div>
        
      </form>
      
    </div>
    
    <div class="uk-modal-footer uk-text-right">
      
      <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
      
      <button form="form-update-{{ $office->id }}" class="uk-button uk-button-primary" type="submit" >Actualizar</button>
      
    </div>
    
  </div>

</div>