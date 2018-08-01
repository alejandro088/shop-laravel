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

Route::get('/', 'PageController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show'); //show product

Route::post('/cart','CartDetailController@store'); //save data
Route::delete('/cart','CartDetailController@destroy'); //delete

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){
Route::get('/products','ProductController@index'); //listado
Route::get('/products/create','ProductController@create'); //show form
Route::post('/products','ProductController@store'); //save data
Route::get('/products/{id}/edit','ProductController@edit'); //show form
Route::post('/products/{id}/edit','ProductController@update'); //save data
Route::post('/products/{id}/delete','ProductController@destroy'); //delete

Route::get('/products/{id}/images','ImageController@index'); //listado
Route::post('/products/{id}/images','ImageController@store'); //save data
Route::delete('/products/{id}/images','ImageController@destroy'); //delete
Route::get('/products/{id}/images/select/{image}','ImageController@select'); //featured
});