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
	return view('index', ['titlePage' => 'Suporte']);
});
//ROTAS ADMIN
Route::get('admin', 'AdminController@index');
Route::get('admin/search', 'AdminController@search');
Route::get('admin/view/{token}', 'AdminController@view');
Route::post('admin/add', 'AdminController@add');

//ROTAS TICKET
Route::post('ticket/add', 'TicketController@add');
Route::get('ticket/view', 'TicketController@view');
Route::post('ticket/login', 'TicketController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
