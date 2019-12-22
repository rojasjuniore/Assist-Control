<?php
#Login y Logout
Route::get('/', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('logout', 'Auth\LoginController@logout');

#Socialite o Socialogin
/*
Route::get('loginpromocion', ['as' => 'loginfacebook', 'uses' => 'LoginController@showLoginFormfacebook']);
Route::get('login/{service}', 'LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'LoginController@handleProviderCallback');
*/
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


#Registro de Usuario
Route::get('register', ['as' => 'register', function () { abort(499, 'Not available in demo mode.'); }]);
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);



Route::post('register', ['as' => 'register.post', 'uses' => 'LoginController@register']);



# Password Reset
Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);


Route::group(['middleware' => 'auth'], function () {

    //Rutas soporte
    Route::get('/soporte', 'HomeController@soporte')->name('soporte');

    //Rutas de la plantilla
    Route::get('/dashboard', 'HomeController@dashboard')->name('home-one');
    Route::get('/home-two', 'HomeController@homeTwo')->name('home-two');
    Route::get('/stripe', 'HomeController@stripe')->name('stripe');

    //Rutas del perifl
    Route::get('/perfil', 'HomeController@perfil')->name('perfil');
    Route::post('/storeperfil', 'HomeController@storeperfil')->name('storeperfil');

    //Rutas de prealertas
    Route::get('/pre-alertas', 'PrealertaController@index')->name('pre-alertas');
    Route::get('/pre-alertas/mostrar/{id}', 'PrealertaController@mostrar')->name('prealertas-mostrar');
    Route::post('/pagostripe/{amount}', 'PaymentController@pagoStripe');
    Route::post('/pagostripepromo/{amount}', 'PaymentController@pagoStripePromo');
    Route::post('/cobro', 'StripeController@cobro');

    Route::post('/pagoenviopromo', 'PaymentController@pagoEnvioPromo')->name('pagoenviopromo');

    //Rutas de direcciones
    Route::get('/direcciones', function () {
        return view('direcciones.index');
    })->name('direcciones');

    //Rutas de Servicios Adicionales
    Route::get('/servicioadicional', function () {
        return view('servicioadicional.index');
    })->name('servicioadicional');

    //rutas de ordenes
    Route::get('/ordenes', 'OrderController@index')->name('ordenes');
    Route::get('/ordenes/mostrar/{id}', 'OrderController@mostrar')->name('ordenes-mostrar');
    Route::get('/ordenes/buscar', 'OrderController@buscar')->name('ordenes-buscar');

    //Rutas de programar envios
    Route::get('programar-envios', 'OrderController@programar')->name('programar-envios');
    Route::get('programar-ver', 'OrderController@ver')->name('programar-ver');

    Route::view('/checkoutfinish', 'checkout-finish');
    Route::view('/checkoutfinishe', 'checkout-finishe');
    Route::view('/checkoutfinishpromo', 'checkout-finishpromo');
    Route::get('/checkout/{usd}', 'PaymentController@checkout')->name('checkout');
    Route::post('/checkout', 'PaymentController@createPayment')->name('create-payment');
    Route::post('/checkoutpromo', 'PaymentController@createPaymentPromo')->name('create-payment-promo');
    Route::get('/confirm', 'PaymentController@confirmPayment')->name('confirm-payment');
    Route::get('/confirmpromo', 'PaymentController@confirmPaymentpromo')->name('confirm-payment-promo');

    //Rutas de promoción
    Route::get('/promocion', 'HomeController@promocion')->name('promocion');

    //Rutas guia
    Route::get('/guia', 'GuiaController@index')->name('guia');

    //Rutas FacturacionDHL
    Route::get('/facturaciondhl', 'HomeController@facturaciondhl')->name('facturaciondhl');
    Route::get('/facturacioncomun', 'HomeController@facturacioncomun')->name('facturacioncomun');

    ##############
    # HOMEOPATIA #
    ##############

    #Roles
    Route::resource('roles', 'RoleController');

    #Menus
    Route::resource('menus', 'MenuController');

    #Permisos
    Route::resource('permissions', 'PermissionController');

    #Users
    Route::resource('users', 'UserController');
    Route::post('users/{user}', 'UserController@cambioClave')->name('users.cambioClave');

    #Medicamentos
    Route::resource('medicamentos', 'MedicamentoController');

    #Estudios Medicos
    Route::resource('estudios', 'EstudiosController');

    #CRemedios
    Route::resource('cremedios', 'CremediosController');

    #Remedios
    Route::resource('remedios', 'RemediosController');

    #Creditos
    Route::resource('creditos', 'CreditosController');

    #Paypal
    Route::get('payment/{pricing_id}', 'PaypalController@postPayment')->name('payment');
    Route::get('payment/status/{pricing_id}', 'PaypalController@getPaymentStatus')->name('payment.status');
    Route::get('pagado/{credito_id}', 'PaypalController@pagado')->name('pagado');


});

Route::group(['middleware' => 'admin'], function () {
    //Rutas para los usuarios
    Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
    Route::get('/listado-ordenes', 'OrderController@list')->name('listado-ordenes');
    Route::get('/promociones', function () {
        return view('promocion.index');
    })->name('promociones');

});

#Rutas Publicas:

//Rutas del front
Route::get('/somos', 'SomosController@index')->name('somos');

Route::get('/politicas-privacidad/', function () {
    return view('front.politicas-privacidad');
})->name('politicas-privacidad');

Route::get('/faq/', function () {
    return view('front.faq');
})->name('faq');

Route::get('/contacto/', function () {
    return view('front.contacto');
})->name('contacto');

Route::get('/surcusales/', function () {
    return view('front.surcusales');
})->name('surcusales');

Route::get('/servicios/', function () {
    return view('front.servicios');
})->name('servicios');

Route::get('/includes/rastrear/', function () {
    return view('front.rastrear');
})->name('rastrear');

Route::get('/calculadora/', function () {
    return view('front.calculadora');
})->name('calculadora');

Route::get('/directorio/', function () {
    return view('front.directorio');
})->name('directorio');


#Geografico
Route::get('searchState/{pais_id}', 'EstadoController@searchState')->name('searchState');
Route::get('searchCity/{estado_id}', 'CiudadController@searchCity')->name('searchCity');




