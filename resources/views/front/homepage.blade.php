@extends('layouts.front.app')

@section('content')

<!-- CARD -->

<style>
 * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 33%;
  padding: 0 10px;
  padding-bottom: 30px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 1px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #F8F8F8;
}
</style>

   
    <div class="row">
        
        @php $n = count($dolci??[]); @endphp

        @for ($i = 0; $i < $n; $i++)
            <div class="column">
                <div class="card">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $dolci[$i]['nome']}}</h5>
                        <p class="card-text"> Quantità disponibile: {{ $dolci[$i]['qta']}}</p>         
                        @php
                          $prezzo_scontato = discountByTime($dolci[$i]['prezzo'], $dolci[$i]['created_at']);
                          if($prezzo_scontato['sconto'] != '0'){
                            echo  "<p class='card-text'> In Saldo:". "<del>". $dolci[$i]['prezzo'] ."</del> <span style='color:red;'>". $prezzo_scontato['prezzo']."</span> -". $prezzo_scontato['sconto']."&#37;</p>";
                          }else{
                           echo  "<p class='card-text'> Costo unitario:". $dolci[$i]['prezzo'] ."</p>";
                          }
                        @endphp
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ing_{{$dolci[$i]['id']}}">
                          Ingredienti <i class="fa fa-search-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                  <!-- MODALE-->
                  <div class="modal" id="ing_{{$dolci[$i]['id']}}">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Ingredienti</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          @if(isset($dolci[$i]['ingredienti']))
                           
                            @foreach($dolci[$i]['ingredienti'] as $ingrediente)
                              @if($loop->last)
                                {{$ingrediente->nome}}
                              @else
                                {{$ingrediente->nome}},
                              @endif
                            @endforeach

                          @endif
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- MODALE-->
            </div>
        @endfor
    </div>

    
  

@endsection
