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

Route::get('/show', 'DonationController@index_data')->name('show');

Route::get('/post', 'DonationController@post_data')->name('post');
Route::post('/ajax_post', 'DonationController@ajax_post')->name('ajax_post');

Route::post('/store_data', 'DonationController@ajax')->name('store_data');

Route::get('/create', 'DonationController@create_data')->name('create');
Route::post('/store-data', 'DonationController@store_data')->name('store-data');


Route::get('/view', 'CategoryController@index')->name('view');

Route::get('add', 'CategoryController@create')->name('add');
Route::post('store', 'CategoryController@store')->name('store');


