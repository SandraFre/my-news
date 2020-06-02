<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login.post');
        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')
            ->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')
            ->name('password.email');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')
            ->name('password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset')
            ->name('password.update');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', 'AdminHomeController')->name('home');
    });
});
