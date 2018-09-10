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

Auth::routes();
Route::get('/', 'HomeController');
Route::get('/home', 'HomeController@home')->middleware('auth');
Route::get('/generate', 'HomeController@generate')->middleware('auth');
Route::post('/verify', 'HomeController@verify')->middleware('auth');
