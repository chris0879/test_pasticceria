@extends('layouts.admin.basic')
@section('content')

  <form action="{{route('admin.dolci.update', $dolce)}}" method="POST">
    @csrf
    @method('put')
    @include('admin.dolci._form')
    <button type="submit" class="btn btn-warning btn-lg btn-block">Update</button>
  </form>
@stop

@push('scripts')


@endpush