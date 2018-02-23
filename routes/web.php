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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('dashboard')->name('dashboard.')->namespace('Dashboard')->group(function () {


	Route::middleware(['guest:admin'])->namespace('Auth')->group(function () {

		// Route::get('login', 'AuthController@showLoginPage')->name('login');
		// Route::post('login', 'AuthController@login')->name('login.post');
		// Route::get('password/reset', 'AuthController@showResetLinkRequestPage')->name('password.request');
		// Route::post('password/email', 'AuthController@sentResetLinkEmail')->name('password.email');
		// Route::get('password/reset/{token}', 'AuthController@showPasswordResetPage')->name('password.reset');
		// Route::post('password/reset', 'AuthController@resetPassword')->name('password.reset.post');

		Route::get('login', 'LoginController@showLoginForm')->name('login');
		Route::post('login', 'LoginController@login')->name('login.post');

		Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
		Route::post('password/email', 'ForgotPasswordController@SendResetLinkEmail')->name('password.email');

		Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
		Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset.post');

	});


	Route::middleware(['auth.admin'])->group(function () {

		Route::get('logout', 'Auth\LoginController@logout')->name('logout');

		Route::get('/', 'IndexController')->name('index');

	});


});