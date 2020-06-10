<?php

namespace App\Http\Controllers;
use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
  public function index() {
    $vendedores = Vendedor::paginate(15);
    return $vendedores;
  }
  
  public function list() {
    return view('vendedores.index');
  }

  public function show($id) {
    return Vendedor::with('vendas')->find($id);
  }

  public function vendas($id) {
    return view('vendedores.show', ['id' => $id]);  
  }

  public function create() {
    return view('vendedores.create');
  }

  public function store(Request $request) {
    $vendedor = new Vendedor();

    $vendedor->nome = $request->nome;
    $vendedor->email = $request->email;

    $vendedor->save();
    return view('vendedores.index');
  }

  public function edit($id) {
    $vendedor = Vendedor::find($id);

    return $vendedor;
  }

  public function update() {

  }

  public function destroy() {
    $vendedor = Vendedor::find($id)->delete();
  }
}
