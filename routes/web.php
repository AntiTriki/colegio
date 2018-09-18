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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'tipopersona'], function () {
    Route::get('/', 'TipopersonaController@index');
    Route::match(['get', 'post'], 'create', 'TipopersonaController@create');
    Route::match(['get', 'put'], 'update/{id}', 'TipopersonaController@update');
    Route::delete('delete/{id}', 'TipopersonaController@delete');
});
Route::group(['prefix' => 'gestion'], function () {
    Route::get('/', 'GestionController@index');
    Route::match(['get', 'post'], 'create', 'GestionController@create');
    Route::match(['get', 'put'], 'update/{id}', 'GestionController@update');
    Route::delete('delete/{id}', 'GestionController@delete');
});
Route::group(['prefix' => 'bimestre'], function () {
    Route::get('/', 'BimestreController@index');
    Route::match(['get', 'post'], 'create', 'BimestreController@create');
    Route::match(['get', 'put'], 'update/{id}', 'BimestreController@update');
    Route::delete('delete/{id}', 'BimestreController@delete');
});
Route::group(['prefix' => 'grado'], function () {
    Route::get('/', 'GradoController@index');
    Route::match(['get', 'post'], 'create', 'GradoController@create');
    Route::match(['get', 'put'], 'update/{id}', 'GradoController@update');
    Route::delete('delete/{id}', 'GradoController@delete');
});
Route::group(['prefix' => 'grupo'], function () {
    Route::get('/', 'GrupoController@index');
    Route::match(['get', 'post'], 'create', 'GrupoController@create');
    Route::match(['get', 'put'], 'update/{id}', 'GrupoController@update');
    Route::delete('delete/{id}', 'GrupoController@delete');
});
Route::group(['prefix' => 'materia'], function () {
    Route::get('/', 'MateriaController@index');
    Route::match(['get', 'post'], 'create', 'MateriaController@create');
    Route::match(['get', 'put'], 'update/{id}', 'MateriaController@update');
    Route::delete('delete/{id}', 'MateriaController@delete');
});
Route::group(['prefix' => 'nivel'], function () {
    Route::get('/', 'NivelController@index');
    Route::match(['get', 'post'], 'create', 'NivelController@create');
    Route::match(['get', 'put'], 'update/{id}', 'NivelController@update');
    Route::delete('delete/{id}', 'NivelController@delete');
});
Route::group(['prefix' => 'persona'], function () {
    Route::get('/', 'PersonaController@index');
    Route::match(['get', 'post'], 'create', 'PersonaController@create');
    Route::match(['get', 'put'], 'update/{id}', 'PersonaController@update');
    Route::delete('delete/{id}', 'PersonaController@delete');
});
Route::group(['prefix' => 'inscripcion'], function () {
    Route::get('/', 'InscripcionController@index');
    Route::match(['get', 'post'], 'create', 'InscripcionController@create');
    Route::match(['get', 'put'], 'update/{id}', 'InscripcionController@update');
    Route::delete('delete/{id}', 'InscripcionController@delete');
});
Route::group(['prefix' => 'asistencia'], function () {
    Route::get('/', 'AsistenciaController@index');
    Route::match(['get', 'post'], 'create', 'AsistenciaController@create');
    Route::match(['get', 'put'], 'update/{id}', 'AsistenciaController@update');
    Route::delete('delete/{id}', 'AsistenciaController@delete');
});
Route::group(['prefix' => 'parentezco'], function () {
    Route::get('/', 'ParentezcoController@index');
    Route::match(['get', 'post'], 'create', 'ParentezcoController@create');
    Route::match(['get', 'put'], 'update/{id}', 'ParentezcoController@update');
    Route::delete('delete/{id}', 'ParentezcoController@delete');
});
Route::group(['prefix' => 'programa'], function () {
    Route::get('/', 'ProgramaController@index');
    Route::match(['get', 'post'], 'create', 'ProgramaController@create');
    Route::match(['get', 'put'], 'update/{id}', 'ProgramaController@update');
    Route::delete('delete/{id}', 'ProgramaController@delete');
});
Route::group(['prefix' => 'puntaje'], function () {
    Route::get('/', 'PuntajeController@index');
    Route::match(['get', 'post'], 'create', 'PuntajeController@create');
    Route::match(['get', 'put'], 'update/{id}', 'PuntajeController@update');
    Route::delete('delete/{id}', 'PuntajeController@delete');
});
Route::group(['prefix' => 'tiponota'], function () {
    Route::get('/', 'TiponotaController@index');
    Route::match(['get', 'post'], 'create', 'TiponotaController@create');
    Route::match(['get', 'put'], 'update/{id}', 'TiponotaController@update');
    Route::delete('delete/{id}', 'TiponotaController@delete');
});
Route::group(['prefix' => 'turno'], function () {
    Route::get('/', 'TurnoController@index');
    Route::match(['get', 'post'], 'create', 'TurnoController@create');
    Route::match(['get', 'put'], 'update/{id}', 'TurnoController@update');
    Route::delete('delete/{id}', 'TurnoController@delete');
});

