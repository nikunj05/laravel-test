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

Route::get('/skilltest',  array('as' => 'product.create', 'uses' => 'ProductController@create'));
Route::post('/skilltest',  array('as' => 'product.addProduct', 'uses' => 'ProductController@addProduct'));
Route::get('/skilltest/getProducts',  array('as' => 'product.getProducts', 'uses' => 'ProductController@getProducts'));
