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

//add the route for the photos
Route::get('/photo', 'LoveSonController@photo')->middleware('auth')->name('photo');

//add 2 new routes for middleware and contact
Route::get('/contact', 'ContactController@create')->middleware('auth')->name('contact');
Route::post('/contact', 'ContactController@store')->name('contact');