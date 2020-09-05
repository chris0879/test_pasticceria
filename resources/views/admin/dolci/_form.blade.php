<br>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label>Nome*</label>
      <input type="text"  name="nome"  class="form-control" value="{{ $dolce->nome ?? null }}"  required>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label>Quantità*</label>
      <input type="number"  name="qta" step="1" min="0" class="form-control" value="{{ $dolce->qta ?? null }}"  required>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
        <label>Prezzo*</label>
        <input type="number"  name="prezzo" step="1" min="1" class="form-control" value="{{ $dolce->prezzo ?? null }}"  required>
    </div>
  </div>
  <div class="col-md-12">
    <br> 
    <h4>Ingredienti</h4>    
    <div class="form-group">
     
        @foreach($ingredienti as $ingrediente)
          <div class="checkbox">
            <label><input type="checkbox" name="ingredienti[]"  value="{{$ingrediente->id??0}}" @if (in_array($ingrediente->id, $id_selezionati_ingredienti??[])) checked @endif > {{$ingrediente->nome??null}}</label>
          </div>
        @endforeach
  

    </div> 
  </div>       
</div>
<br>