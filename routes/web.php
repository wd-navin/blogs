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

 ////... BLOGS CONTROLLER ..///
Route::get('/post-show-data', 'BlogsController@index')->name('post-show-data');
Route::get('/post', 'BlogsController@post_data')->name('post');
Route::post('/ajax_post', 'BlogsController@ajax_post')->name('ajax_post');
Route::get('delete/{id}', 'BlogsController@destroy')->name('delete');

///.. DONATION CONTROLLER .../////
Route::get('/show', 'DonationController@index_data')->name('show');
Route::post('/store_data', 'DonationController@store_data')->name('store_data');
Route::post('ajax_list','DonationController@ajax_data')->name('ajax_list');
Route::get('edit_data','DonationController@show')->name('edit_data');
Route::post('update','DonationController@update');
Route::delete('users_destroy','DonationController@destroy');
Route::delete('del_image','DonationController@del_image');
Route::get('donation-page','DonationController@donation_data')->name('donation-page');
//Route::get('delete-user/{id}', function ($id) {
//    App\Models\DonationImages::destroy($id);
//    return 'User '.$id.' deleted';
//});

/////.... CATEGORY CONTROLLER ...////
Route::get('/view', 'CategoryController@index')->name('view');
Route::get('add', 'CategoryController@create')->name('add');
Route::post('store', 'CategoryController@store')->name('store');
Route::delete('category', 'CategoryController@destroy');
Route::post('cat_ajax', 'CategoryController@create_data')->name('cat_ajax');


