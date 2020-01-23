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

# Password Reset
Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

#Geografico
Route::get('searchState/{pais_id}', 'EstadoController@searchState')->name('searchState');
Route::get('searchCity/{estado_id}', 'CiudadController@searchCity')->name('searchCity');

#Multilenguaje
Route::get('/lang/{locale?}', 'Auth\LoginController@changeLang')->name('lang');

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

    Route::resource('asistencias', 'AsistenciaController');
    Route::get('/mensual', 'AsistenciaController@mensual')->name('asistencias.mensual');
    Route::get('/semanal', 'AsistenciaController@semanal')->name('asistencias.semanal');
    Route::get('searchMensual', 'AsistenciaController@searchMensual')->name('searchMensual');
    Route::get('searchSemanal', 'AsistenciaController@searchSemanal')->name('searchSemanal');


});

