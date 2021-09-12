<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientesController;

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

Route::get('/teste1', 'HomeController@teste1')->name('teste1')->middleware('auth');
Route::post('/teste1', 'HomeController@t1Result')->name('t1Result')->middleware('auth');
Route::get('/teste2', 'HomeController@teste2')->name('teste2')->middleware('auth');
Route::post('/teste2', 'HomeController@t2Result')->name('t2Result')->middleware('auth');

Route::get('/home', 'ClientesController@index')->name('home')->middleware('auth');
Route::get('/clientes/{id}', 'ClientesController@cadastro')->name('cadastro')->middleware('auth');
Route::post('/clientes/{id}', 'ClientesController@salvar')->name('salvar')->middleware('auth');
Route::delete('/clientes/delete/{id}', 'ClientesController@destroy')->name('deletar')->middleware('auth');