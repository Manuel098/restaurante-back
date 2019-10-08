<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/mesas', 'MesasController');
Route::resource('/inventario', 'InventarioController');
Route::resource('/meseros', 'MeserosController');
Route::resource('/mesamesero', 'MesaMeseroController');
Route::resource('/categorias', 'CategoriasController');
Route::resource('/platillos', 'PlatillosController');
Route::resource('/platillomesa', 'PlatilloMesaController');
Route::resource('/proveedores', 'ProveedoresController');
Route::resource('/producto', 'ProductoController');
Route::resource('/entradaproducto', 'EntradaProductoController');
Route::resource('/ticket', 'TicketController');
Route::resource('/ganancias', 'GananciasController');
