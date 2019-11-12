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

Route::resource('/mesas', 'MesasController')->except([
        'create','edit', 'create'
    ]);
Route::resource('/inventario', 'InventarioController')->except([
        'create','edit', 'create'
    ]);
Route::resource('/meseros', 'MeserosController')->except([
        'create','edit', 'create'
    ]);
Route::resource('/mesamesero', 'MesaMeseroController')->except([
        'create','edit', 'create'
    ]);
Route::resource('/categorias', 'CategoriasController')->except([
        'create','edit', 'create'
    ]);
Route::resource('/platillos', 'PlatillosController')->except([
        'create','edit', 'create'
    ]);
Route::resource('/platillomesa', 'PlatilloMesaController')->except([
        'create','edit', 'create'
    ]);
Route::resource('/proveedores', 'ProveedoresController')->except([
        'create','edit', 'create'
    ]);
Route::resource('/producto', 'ProductoController')->except([
        'create','edit', 'create'
    ]);
Route::resource('/entradaproducto', 'EntradaProductoController')->except([
        'create','edit', 'create'
    ]);
Route::resource('/ticket', 'TicketController')->except([
        'create','edit', 'create'
    ]);
Route::resource('/ganancias', 'GananciasController')->except([
        'create','edit', 'create'
    ]);
