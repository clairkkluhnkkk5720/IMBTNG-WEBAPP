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
		Route::get('login', 'LoginController@showLoginForm')->name('login');
		Route::post('login', 'LoginController@login')->name('login.post');

		Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
		Route::post('password/email', 'ForgotPasswordController@SendResetLinkEmail')->name('password.email');

		Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
		Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset.post');
	});

	Route::middleware(['auth.admin'])->group(function () {
		Route::post('logout', 'Auth\LoginController@logout')->name('logout');
		
		Route::get('/', 'IndexController')->name('index');

		Route::resource('roles', 'RolesController');
		Route::delete('roles/{role}/permissions/{permission}', 'RolesController@removePermission')->name('roles.permissions.remove');
		// Route::delete('roles/{role}/admins/{admin}', 'RolesController@removeAdminRole')->name('roles.admins.remove');
		
		Route::get('admins/trash', 'AdminsTrashController@index')->name('admins.trash.index');
		Route::get('admins/trash/{admin}', 'AdminsTrashController@show')->name('admins.trash.show');
		Route::post('admins/trash/{admin}', 'AdminsTrashController@restore')->name('admins.trash.restore');
		Route::resource('admins', 'AdminsController');

		Route::get('members', 'MembersController@index')->name('members.index');
		Route::get('members/banned', 'MembersController@banned')->name('members.banned');
		Route::get('members/{user}', 'MembersController@show')->name('members.show');
		Route::delete('members/{user}', 'MembersController@ban')->name('members.ban');
		Route::post('members/{user}/unban', 'MembersController@unban')->name('members.unban');
		Route::get('members/{user}/transactions', 'MembersController@transactions')->name('members.transactions');
		Route::get('members/{user}/bets', 'MembersController@bets')->name('members.bets.index');
		Route::get('members/{user}/bets/winning', 'MembersController@winningBets')->name('members.bets.winning');
		Route::get('members/{user}/bets/losing', 'MembersController@losingBets')->name('members.bets.losing');
		Route::get('members/{user}/bets/pending', 'MembersController@pendingBets')->name('members.bets.pending');

		Route::resource('events', 'EventsController');
		Route::resource('bets', 'BetsController');

		// DEMO
		// Route::get('events', 'EventsController@index')->name('events.index');
		// Route::get('bets', 'BetsController@index')->name('bets.index');
	});


});