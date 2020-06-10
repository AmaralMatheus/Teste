<?php

namespace App\Http\Controllers;
use App\Models\Vendedor;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
  public function index() {
    $vendas = Venda::with('vendedor')->paginate(15);

    return $vendas;
  }
  
  public function list() {
    return view('vendas.index');
  }

  public function show($id) {
    return Venda::find($id);
  }

  public function create() {
    return view('vendas.create');
  }

  public function store(Request $request) {
    $venda = new Venda();

    $venda->valor = $request->valor;
    $venda->data = $request->data;
    $venda->vendedor_id = $request->vendedor;

    $venda->save();
    return view('vendas.index');
  }

  public function edit($id) {
    $venda = Venda::find($id);

    return $venda;
  }

  public function update() {

  }

  public function destroy() {
    $venda = Venda::find($id)->delete();
  }
}
