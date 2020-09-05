@extends('layouts.admin.basic')
@section('content')



  <form action="{{ route('admin.dolci.store') }}" method="POST">
    @csrf

  


@include('admin.dolci._form')
  <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
  </form>
@stop


@push('scripts')



@endpush
