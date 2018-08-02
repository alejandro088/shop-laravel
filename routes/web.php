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
Route::get('/search','SearchController@show'); //show search
Route::get('/products/json','SearchController@data'); //show data json

Route::get('/products/{id}','ProductController@show'); //show product
Route::get('/categories/{category}','CategoryController@show'); //show category



Route::post('/cart','CartDetailController@store'); //save data
Route::delete('/cart','CartDetailController@destroy'); //delete

Route::post('/order','CartController@update'); //update data

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

    Route::get('/categories','CategoryController@index'); //listado
    Route::get('/categories/create','CategoryController@create'); //show form
    Route::post('/categories','CategoryController@store'); //save data
    Route::get('/categories/{category}/edit','CategoryController@edit'); //show form
    Route::post('/categories/{category}/edit','CategoryController@update'); //save data
    Route::delete('/categories/{category}','CategoryController@destroy'); //delete
});