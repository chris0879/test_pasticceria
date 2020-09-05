@extends('layouts.admin.basic')
<style>
    tr.collapse.in {
  display:table-row;
}
</style>
@section('content')
<div class="app-title">
        <div>
            <h1><i class="fa fa-bar-chart"></i>Ingredienti</h1>
          
        </div>
</div>

    


    <div class="offset-md-10 col-md-2">
        <a href="{{ route('admin.ingredienti.create') }}" class="btn btn-primary btn-block">+ Aggiungi Ingrediente</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="userTablex">
                        <thead>
                        <tr>
                            <th class="text-center"> nome </th>
                            <th class="text-center"> action </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($ingredienti as $ingrediente)
                            <tr> 
                                <td class="text-center">{{ $ingrediente->nome }}</td>
                              
                                
                                <td class="text-center">
                                    <a  href="{{ route('admin.ingredienti.edit', $ingrediente->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                  

                                    <a class="btn btn-danger btn-sm" href="#" onclick="event.preventDefault(); document.getElementById('delete-ingredienti-{{ $ingrediente->id }}-form').submit();">Delete</a>
                                    <form id="delete-ingredienti-{{ $ingrediente->id }}-form" action="{{ route('admin.ingrediente.destroy', $ingrediente) }}" method="POST" style="display: none;">
                                        @method('DELETE')
                                        @csrf
                                    </form>

                                </td>

                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            {{ $ingredienti->links() }}
        </div>
    </div>
    
   

@stop




