@extends('index')

@section('content')
  <div class="container">
    <div class="card">
      <Vendedor id="{{ $id }}">
      </Vendedor>
    </div>
  </div>
@endsection