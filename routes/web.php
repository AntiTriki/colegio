<?php

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
    return view('auth.login');
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'tipopersona','middleware'=>'admin'], function () {
    Route::get('/', 'TipopersonaController@index');
    Route::match(['get', 'post'], 'create', 'TipopersonaController@create');
    Route::match(['get', 'put'], 'update/{id}', 'TipopersonaController@update');
    Route::delete('delete/{id}', 'TipopersonaController@delete');
});
Route::group(['prefix' => 'gestion','middleware'=>'admin'], function () {
    Route::get('/', 'GestionController@index');
    Route::match(['get', 'post'], 'create', 'GestionController@create');
    Route::match(['get', 'put'], 'update/{id}', 'GestionController@update');
    Route::delete('delete/{id}', 'GestionController@delete');
});
Route::group(['prefix' => 'bimestre','middleware'=>'admin'], function () {
    Route::get('/', 'BimestreController@index');
    Route::match(['get', 'post'], 'create', 'BimestreController@create');
    Route::match(['get', 'put'], 'update/{id}', 'BimestreController@update');
    Route::delete('delete/{id}', 'BimestreController@delete');
});
Route::group(['prefix' => 'grado','middleware'=>'admin'], function () {
    Route::get('/', 'GradoController@index');
    Route::match(['get', 'post'], 'create', 'GradoController@create');
    Route::match(['get', 'put'], 'update/{id}', 'GradoController@update');
    Route::delete('delete/{id}', 'GradoController@delete');
});
Route::group(['prefix' => 'grupo','middleware'=>'admin'], function () {
    Route::get('/', 'GrupoController@index');
    Route::match(['get', 'post'], 'create', 'GrupoController@create');
    Route::match(['get', 'put'], 'update/{id}', 'GrupoController@update');
    Route::delete('delete/{id}', 'GrupoController@delete');
});
Route::group(['prefix' => 'materia','middleware'=>'admin'], function () {
    Route::get('/', 'MateriaController@index');
    Route::match(['get', 'post'], 'create', 'MateriaController@create');
    Route::match(['get', 'put'], 'update/{id}', 'MateriaController@update');
    Route::delete('delete/{id}', 'MateriaController@delete');
});
Route::group(['prefix' => 'nivel','middleware'=>'admin'], function () {
    Route::get('/', 'NivelController@index');
    Route::match(['get', 'post'], 'create', 'NivelController@create');
    Route::match(['get', 'put'], 'update/{id}', 'NivelController@update');
    Route::delete('delete/{id}', 'NivelController@delete');
});
Route::group(['prefix' => 'persona','middleware'=>'admin'], function () {
    Route::get('/', 'PersonaController@index');
    Route::get('register', 'PersonaController@create');
    //Route::get('edit', 'PersonaController@update');
    Route::post('register', 'Auth\RegisterController@register');
    Route::match(['get', 'post'], 'create', 'PersonaController@create');
    //Route::match(['get', 'put'], 'update/{id}', 'PersonaController@update');
    Route::match(['get', 'put'], 'update/{id}', 'PersonaController@update');
    Route::delete('delete/{id}', 'PersonaController@delete');
});
Route::group(['prefix' => 'inscripcion','middleware'=>'admin'], function () {
    Route::get('/', 'InscripcionController@index');
    Route::match(['get', 'post'], 'create', 'InscripcionController@create');
    Route::match(['get', 'put'], 'update/{id}', 'InscripcionController@update');
    Route::delete('delete/{id}', 'InscripcionController@delete');
});
Route::group(['prefix' => 'asistencia','middleware'=>['admin','profesor']], function () {
    Route::get('/', 'AsistenciaController@index');
    Route::match(['get', 'post'], 'create', 'AsistenciaController@create');
    Route::match(['get', 'put'], 'update/{id}', 'AsistenciaController@update');
    Route::delete('delete/{id}', 'AsistenciaController@delete');
});
Route::group(['prefix' => 'parentezco','middleware'=>'admin'], function () {
    Route::get('/', 'ParentezcoController@index');
    Route::match(['get', 'post'], 'create', 'ParentezcoController@create');
    Route::match(['get', 'put'], 'update/{id}', 'ParentezcoController@update');
    Route::delete('delete/{id}', 'ParentezcoController@delete');
});
Route::group(['prefix' => 'programa','middleware'=>'admin'], function () {
    Route::get('/', 'ProgramaController@index');
    Route::match(['get', 'post'], 'create', 'ProgramaController@create');
    Route::match(['get', 'put'], 'update/{id}', 'ProgramaController@update');
    Route::delete('delete/{id}', 'ProgramaController@delete');
});
Route::group(['prefix' => 'puntaje','middleware'=>'admin'], function () {
    Route::get('/', 'PuntajeController@index');
    Route::match(['get', 'post'], 'create', 'PuntajeController@create');
    Route::match(['get', 'put'], 'update/{id}', 'PuntajeController@update');
    Route::delete('delete/{id}', 'PuntajeController@delete');
});
Route::group(['prefix' => 'tiponota','middleware'=>'admin'], function () {
    Route::get('/', 'TiponotaController@index');
    Route::match(['get', 'post'], 'create', 'TiponotaController@create');
    Route::match(['get', 'put'], 'update/{id}', 'TiponotaController@update');
    Route::delete('delete/{id}', 'TiponotaController@delete');
});
Route::group(['prefix' => 'turno','middleware'=>'admin'], function () {
    Route::get('/', 'TurnoController@index');
    Route::match(['get', 'post'], 'create', 'TurnoController@create');
    Route::match(['get', 'put'], 'update/{id}', 'TurnoController@update');
    Route::delete('delete/{id}', 'TurnoController@delete');
});

//Route::get('/persona', [
//    'as'   => 'persona.index',
//    'uses' => 'Auth\RegisterController@success'
//]);
//Route::group([
//    'prefix'     => 'admin',
//    'middleware' => [
//        'auth',
//        'anotherMiddleware',
//        'yetAnotherMiddleware',
//    ],
//], function() {
//
//    Route::get('dashboard', function() {} );
//});