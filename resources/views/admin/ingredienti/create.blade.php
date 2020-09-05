@extends('layouts.admin.basic')
@section('content')



  <form action="{{ route('admin.ingredienti.store') }}" method="POST">
    @csrf



@include('admin.ingredienti._form')
  <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
  </form>
@stop


