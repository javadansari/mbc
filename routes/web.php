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

Route::get('/' , 'SessionController@index');
Route::get('/create' , 'SessionController@create');
Route::post('/create','SessionController@store');


Route::get('/catalogue/index' , 'CatalogueController@index');
Route::get('/catalogue/create' , 'CatalogueController@create');
Route::post('/catalogue/create','CatalogueController@store');




Route::get('/get','RevController@store');

Route::get('chart', 'RevChartController@index');