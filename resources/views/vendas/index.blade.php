@extends('index')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        Vendas
        <div class="btn-wrapper">
          <a href="{{ route('vendas.create') }}" class="btn btn-primary">
            Cadastrar
          </a>
        </div>
      </div>
      <Vendas>
      </Vendas>
    </div>
  </div>
@endsection