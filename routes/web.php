<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('vendas/listar','VendaController@list')->name('vendas.list');
Route::get('vendedores/listar','VendedorController@list')->name('vendedores.list');
Route::get('vendedores/{id}/vendas','VendedorController@vendas');
