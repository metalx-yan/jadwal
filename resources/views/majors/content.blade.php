@extends('main')

@section('title', 'Jurusan')

@section('content')

<h1 class="section-header">
  <div>{{ ucwords(Auth::user()->role->name) }} Dashboard </div>
</h1>

@endsection
