<?php
#-------------------------------------
#RUTAS PUBLICAS
#-------------------------------------
Auth::routes(['verify' => true]);

#Login y Deslogueo
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('logout', 'Auth\LoginController@logout');

#Registro de Usuario
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

# Password Reset
Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

#Socialite o Socialogin
Route::get('login/facebook', 'SocialiteController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'SocialiteController@handleProviderCallback');

Route::get('login/twitter', 'SocialiteController@redirectToTwitterProvider')->name('login.twitter');
Route::get('login/twitter/callback', 'SocialiteController@handleTwitterProviderCallback');

Route::get('login/google', 'SocialiteController@redirectToGoogleProvider')->name('login.google');
Route::get('login/google/callback', 'SocialiteController@handleGoogleProviderCallback');

#Geografico
Route::get('searchState/{pais_id}', 'EstadoController@searchState')->name('searchState');
Route::get('searchCity/{estado_id}', 'CiudadController@searchCity')->name('searchCity');

#--------------------------------------------------------------------------------------
#RUTAS PROTEGIDAS POR LA AUTENTICACION Y VERIFICACION DE EMAIL AL MOMENTO DEL REGISTRO
#--------------------------------------------------------------------------------------

Route::group(['middleware' => array('auth', 'verified')], function () {

    #Home
    Route::get('/dashboard', 'HomeController@dashboard')->name('home-one');

    #Rutas del Perfil
    Route::get('/perfil', 'HomeController@perfil')->name('perfil');
    Route::post('/storeperfil', 'HomeController@storeperfil')->name('storeperfil');

    #Roles
    Route::resource('roles', 'RoleController');

    #Menus
    Route::resource('menus', 'MenuController');

    #Permisos
    Route::resource('permissions', 'PermissionController');

    #Usuarios
    Route::resource('users', 'UserController');
    Route::post('users/{user}', 'UserController@cambioClave')->name('users.cambioClave');

    #Paypal
    Route::get('payment/{pricing_id}', 'PaypalController@postPayment')->name('payment');
    Route::get('payment/status/{pricing_id}', 'PaypalController@getPaymentStatus')->name('payment.status');
    Route::get('pagado/{credito_id}', 'PaypalController@pagado')->name('pagado');

});