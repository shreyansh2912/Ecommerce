@extends('layouts.admin')

@section('admin')
@if (session('message'))
<div class="alert alert-success" role="alert">
    {{ session('message') }}
  </div>
  @endif
@endsection