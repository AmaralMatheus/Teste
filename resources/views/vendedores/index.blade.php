@extends('index')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        Vendedores
        <div class="btn-wrapper">
          <a class="btn btn-primary" href="{{ route('vendedores.create') }}">
            Cadastrar
          </a>
        </div>
      </div>
      <Vendedores>
      </Vendedores>
    </div>
  </div>
@endsection