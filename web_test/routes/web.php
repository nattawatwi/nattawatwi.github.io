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

Route::get('welcome', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('index', function () {
    return view('index');
})->middleware('auth');

Route::get('/page', 'HomeController@page');

Route::get('form', function () {
    return view('form');
});

//Route::get('/postProfile', 'ProfileController@saveProfile');


/////
Route::get('formProfile', function () {
    return view('form_profile');
});

Route::post('postProfile', 'ProfileController@postProfile');

Route::get('profile_list', 'ProfileController@getProfile');

Route::post('delProfile', 'ProfileController@delprofile');

Route::get('edit_{id}', 'ProfileController@formEdit');
Route::post('updateProfile', 'ProfileController@updateProfile');
