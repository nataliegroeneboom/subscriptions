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

Route::get('/subscriptions', 'SubscriptionsController@index');
Route::get('/subscriptions/create', 'SubscriptionsController@create');
Route::post('/subscriptions', 'SubscriptionsController@store');
Route::put('/subscriptions/{subscription}', 'SubscriptionsController@update');
Route::get('/subscriptions/{subscription}', 'SubscriptionsController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
