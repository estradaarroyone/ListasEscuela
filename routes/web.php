<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas
Route::resource("Lista","ListasController");
Route::get("Lista","ListasController@index");
Route::get("Lista/create","ListasController@create");
Route::get('Lista/delete/{id}','ListasController@destroy');
Route::put('edit/{id}','ListasController@update')->name('product.update');

Route::get('/search','ApiSearchController@search')->name('api.search');
Route::get('ListaDownload','ListasController@pdf')->name('ListadoListas.pdf');

Route::get('/', array('uses' =>'HomeController@index', 'as' => '/'));

Route::resource('/search', 'ApiSearchController');
Route::get('/search1',['uses' => 'ApiSearchController@search','as' => 'search']);