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

Route::get('orders', function(){
	
	return dataTables()
			->eloquent(App\Order::query())
			->toJson();

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Rutas API Prealertas*/
Route::resource('prealerta', 'PrealertaController')->only([
	'index', 'update', 'destroy', 'store', 'show'
]);


/*Rutas API Direcciones*/
Route::resource('direccion', 'DireccionController')->only([
	'index', 'update', 'destroy', 'store', 'show'
]);
Route::get('get/{id}/direcciones', 'DireccionController@get')->name('direcciones.get');
Route::get('get/paises', 'DireccionController@getpais')->name('direcciones.pais');
Route::get('get/{id}/ciudades', 'DireccionController@getciudad')->name('direcciones.ciudad');

/*Rutas API Ordenes*/
Route::resource('orden', 'OrderController')->only([
	'index', 'update', 'destroy', 'store', 'show'
]);
Route::get('get/{id}/historial', 'OrderController@gethistorial')->name('ordenes.historial');





