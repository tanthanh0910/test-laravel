<?php

use Illuminate\Support\Facades\Route;

// Authentication Routes...
Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', '\App\Http\Controllers\Auth\LoginController@login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/forgot', 'Common\CommonController@getForgotPassword')->name('password.forgot');
Route::post('password/email', 'Common\CommonController@sendEmailForgotPassword')->name('password.email');
Route::get('password/reset/{token}', 'Common\CommonController@getResetPassword')->name('password.reset.show');
Route::post('password/reset', 'Common\CommonController@resetPassword')->name('password.reset.store');
Route::post('register', 'Common\CommonController@register')->name('register');
Route::get('get-register', 'Common\CommonController@getRegister')->name('get-register');
