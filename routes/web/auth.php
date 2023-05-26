<?php

use Illuminate\Support\Facades\Route;

// Authentication Routes...
Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('post-login', '\App\Http\Controllers\Auth\LoginController@login')->name('post-login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');



Route::get('password/forgot', '\App\Http\Controllers\Common\CommonController@getForgotPassword')->name('password.forgot');
Route::post('password/email', '\App\Http\Controllers\Common\CommonController@sendEmailForgotPassword')->name('password.email');
Route::get('password/reset/{token}', '\App\Http\Controllers\Common\CommonController@getResetPassword')->name('password.reset.show');
Route::post('password/reset', '\App\Http\Controllers\Common\CommonController@resetPassword')->name('password.reset.store');
Route::post('register', '\App\Http\Controllers\Common\CommonController@register')->name('register');
Route::get('get-register', '\App\Http\Controllers\Common\CommonController@getRegister')->name('get-register');
