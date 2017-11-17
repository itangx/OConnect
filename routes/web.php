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

Route::get('/', 'HomeController@index');
Route::get('/activate', 'HomeController@activate');
Route::post('/login', 'HomeController@auth');
Route::post('/activated', 'HomeController@activated');

Route::get('/event/{eventId}', 'EventController@index');
Route::post('/event/{eventId}/search', 'EventController@search');
Route::get('/event/appointment/{criteria}/{eventId}/{cprId}', 'EventController@appointment');
Route::post('/event/appointment', 'EventController@insert');

Route::post('checkDate', 'EventController@checkDate');
