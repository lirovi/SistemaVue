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
    return view('home');
});
Route::post('/dpto/create', 'DptoController@create')->name('dptocreate');
Route::get('/allQuery','QueryController@allQuery')->name('allQuery');
Route::delete('/dpto/delete/{id}','DptoController@delete')->name('dptodelete');
Route::put('/dpto/update','DptoController@update')->name('dptoupdate');

Route::post('/cargo/create','CargoController@create')->name('cargocreate');
Route::delete('/cargo/delete/{id}','CargoController@delete')->name('cargodelete');
Route::put('/cargo/update','CargoController@update')->name('cargoupdate');

Route::post('/funcionario/create','FuncionarioController@create')->name('funcionariocreate');
Route::delete('/funcionario/delete/{id}','FuncionarioController@delete')->name('funcionariodelete');
Route::put('/funcionario/update','FuncionarioController@update')->name('funcionarioupdate');

Route::get('/allQuery','QueryController@allQuery')->name('allQuery'); 