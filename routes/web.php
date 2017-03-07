<?php

Route::get('/', function () {
    return view('dashboard');
});

Route::get('gold', ['uses' => 'CommoditiesController@getGold']);
Route::get('copper', ['uses' => 'CommoditiesController@getCopper']);
Route::get('silver', ['uses' => 'CommoditiesController@getSilver']);
Route::get('iron', ['uses' => 'CommoditiesController@getIron']);

Route::get('oil', ['uses' => 'CommoditiesController@getOil']);
Route::get('gas', ['uses' => 'CommoditiesController@getGas']);

Route::get('coffee', ['uses' => 'CommoditiesController@getCoffee']);
Route::get('corn', ['uses' => 'CommoditiesController@getCorn']);
