@extends('layouts.admin.basic')
<style>
    tr.collapse.in {
  display:table-row;
}
</style>
@section('content')
<div class="app-title">
        <div>
            <h1><i class="fa fa-list"></i> Dolci</h1>
        </div>
</div>

    


    <div class="offset-md-10 col-md-2">
        <a href="{{ route('admin.dolci.create') }}" class="btn btn-primary btn-block">+ Aggiungi Dolce</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="userTablex">
                        <thead>
                        <tr>
                            
                            <th class="text-center"> Nome </th>
                            <th class="text-center"> Creazione </th>
                            <th class="text-center"> Qta </th>
                            <th class="text-center"> Prezzo Pieno </th>
                           
                            <th class="text-center"> Prezzo Scontato </th>
                            <th class="text-center"> Scaduto </th>
                            <th class="text-center"> action </th>
                            
                         
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($dolci as $dolce)
                            <tr>
                                
                                <td class="text-center">{{ $dolce->nome }}</td>
                                <td class="text-center">
                                    {{ $dolce->created_at->format('d-m-Y H:i:s ') }}
                                    @php
                                    $origin = new DateTime($dolce->created_at);
                                    $target = new DateTime("now");
                                    $interval = $origin->diff($target);
                                    echo '<br> Giorni trascorsi: ' . $interval->format("%a");
                                    @endphp
                                </td>
                                <td class="text-center">
                                    {{ $dolce->qta }}
                                    @if($dolce->qta == 0)
                                        <i class="fa fa-times" style="color:red"></i>
                                    @else
                                        <i class="fa fa-check-circle" style="color:green"></i>
                                    @endif
                                </td>
                                <td class="text-center"> &euro; {{ $dolce->prezzo }}</td>
                               
                               
                              
                                <td class="text-center">
                                    @php
                                        $result = discountByTime($dolce->prezzo, $dolce->created_at);
                                        echo '&euro; ' . $result['prezzo'].'<br>';
                                        echo 'sconto applicato ' . $result['sconto'].'&#37;<br>';

                                    @endphp
                                </td>

                                <td class="text-center">
                               
                                    @php
                                        if(isExpired($dolce->created_at)){
                                            echo "SI <i class='fa fa-times' style='color:red'></i>";
                                        }else{
                                            echo 'NO <i class="fa fa-check-circle" style="color:green"></i>';
                                        }
                                    @endphp
                                </td>

                                <td class="text-center">
                                    <a  href="{{ route('admin.dolci.edit', $dolce) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="#" onclick="event.preventDefault(); document.getElementById('delete-dolce-{{ $dolce->id }}-form').submit();">Delete</a>
                                    <form id="delete-dolce-{{ $dolce->id }}-form" action="{{ route('admin.dolci.destroy', $dolce) }}" method="POST" style="display: none;">
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
            {{ $dolci->links() }}
        </div>
    </div>

@stop




