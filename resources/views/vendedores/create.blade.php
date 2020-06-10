@extends('index')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        Cadastrar vendedor
      </div>
      @csrf
      <vendedores-form>
      <vendedores-form>
    </div>
  </div>
@endsection