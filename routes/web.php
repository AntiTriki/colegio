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
