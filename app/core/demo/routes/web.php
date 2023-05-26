<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Core\Demo\Src\Http\Controllers'], function () {
    Route::get('/', 'DemoController@getIndex');
});


