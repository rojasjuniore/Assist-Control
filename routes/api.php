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
//
//Route::get('orders', function(){
//
//	return dataTables()
//			->eloquent(App\Order::query())
//			->toJson();
//
//});
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
///*Rutas API Prealertas*/
//Route::resource('prealerta', 'PrealertaController')->only([
//	'index', 'update', 'destroy', 'store', 'show'
//]);
//
//
///*Rutas API Direcciones*/
//Route::resource('direccion', 'DireccionController')->only([
//	'index', 'update', 'destroy', 'store', 'show'
//]);
//Route::get('get/{id}/direcciones', 'DireccionController@get')->name('direcciones.get');
//Route::get('get/{id}/{id_cli}/direccion', 'DireccionController@getDir')->name('direccion.getdir');
//Route::get('get/paises', 'DireccionController@getpais')->name('direcciones.pais');
//Route::get('get/{id}/ciudades', 'DireccionController@getciudad')->name('direcciones.ciudad');
//
//Route::get('visitap/{code}', 'OrderController@visitap')->name('visitap');
//Route::get('visitah/{code}', 'OrderController@visitah')->name('visitah');
//
///*Rutas API Promociones*/
//Route::resource('promociones', 'PromocionController')->only([
//	'index', 'update', 'destroy', 'store', 'show'
//]);
//Route::get('get/promociones', 'PromocionController@get')->name('promociones.get');
//
///*Rutas API Servicios Adicionales*/
//Route::resource('servicio', 'ServicioAdicionalController')->only([
//	'index', 'update', 'destroy', 'store', 'show'
//]);
//Route::get('get/servicio', 'ServicioAdicionalController@get')->name('servicio.get');
//
//Route::get('getQuotation', 'DhlController@getQuotation');
//
///*Rutas API Ordenes*/
//Route::resource('orden', 'OrderController')->only([
//	'index', 'update', 'destroy', 'store', 'show'
//]);
//Route::get('get/{id}/historial', 'OrderController@gethistorial')->name('ordenes.historial');
//Route::get('get/dhl/{zip}/{paquetes}/{total}', 'OrderController@getdhl')->name('ordenes.dhl');
//Route::get('get/dhlcop/{zip}/{paquetes}/{total}', 'OrderController@getdhlcop')->name('ordenes.dhl');
//
//
//Route::post('cobro-efecty', 'StripeController@cobroEfecty');
//
//Route::post('epayco','PaymentController@epayco');
//Route::post('epaycopromo','PaymentController@epaycopromo');
//
//Route::post('icono', 'ServicioAdicionalController@icono');
//Route::get('iconget', 'ServicioAdicionalController@iconget')->name('iconget');
//
//
//
//
//
