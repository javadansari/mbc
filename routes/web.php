<?php


Route::get('/home', function () {
    return view('index');
});


Route::get('lines', 'LineController@index');
Route::post('lines', 'LineController@index');



Route::get('chart', 'RevChartController@index');
Route::post('chart', 'RevChartController@index');

