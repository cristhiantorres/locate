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

/*Businesses*/
Route::resource('businesses','BusinessController');

/*Offices*/
Route::get('/offices/{id}/create', 'OfficeController@create')->name('office.new');
Route::get('/offices/{id}/index', 'OfficeController@index')->name('office.index');
Route::post('/offices', 'OfficeController@store')->name('office.create');

/*Products*/
Route::get('/products/{id}/index', 'ProductController@index')->name('products.index');
Route::get('/products/{id}/create', 'ProductController@create')->name('products.new');
Route::post('/products', 'ProductController@store')->name('products.create');