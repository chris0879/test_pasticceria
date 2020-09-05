@extends('layouts.admin.basic')
@section('content')

  <form action="{{route('admin.ingredienti.update', $ingrediente)}}" method="POST">
    @csrf
    @method('put')
    @include('admin.ingredienti._form')
    <button type="submit" class="btn btn-warning btn-lg btn-block">Update</button>
  </form>
@stop

