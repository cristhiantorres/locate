<div id="modal-product-{{ $product->id }}" uk-modal>

  <div class="uk-modal-dialog">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    
    <div class="uk-modal-header">

      <h2 class="uk-modal-title">Editar {{ $product->name }}</h2>
      
    </div>
    
    <div class="uk-modal-body">

      <form method="POST" id="form-update-{{ $product->id }}" action="{{ route('products.update', ['product' => $product->id ]) }}" class="uk-grid-small" uk-grid>

        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="uk-width-1-1@s">
        
          <label for="name" class="uk-form-label">Nombre</label>
        
          <input id="name" name="name" class="uk-input" type="text" required value="{{ $product->name }}">
        
        </div>
        
        <div class="uk-width-1-1@s">
        
          <label for="price" class="uk-form-label">Precio</label>
        
          <input id="price" name="price" class="uk-input" type="number" required value="{{ $product->price }}">
        
        </div>
        
        <div class="uk-width-1-1@s">
        
          <label for="description" class="uk-form-label">Descripcion</label>
        
          <textarea name="description" id="description" class="uk-textarea" cols="30" rows="10">
            
            {{ $product->description }}  
          
          </textarea>
        
        </div>
      
      </form>
      
    </div>
    
    <div class="uk-modal-footer uk-text-right">

      <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
      
      <button form="form-update-{{ $product->id }}" class="uk-button uk-button-primary" type="submit" >Actualizar</button>
      
    </div>
    
  </div>

</div>