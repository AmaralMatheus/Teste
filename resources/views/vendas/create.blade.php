@extends('index')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        Cadastrar venda
      </div>
      @csrf
      <vendas-form route="{{ route('vendas.store') }}">
      <vendas-form>
    </div>
  </div>
@endsection