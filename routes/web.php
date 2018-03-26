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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Auth')->group(function () {

	Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'RegisterController@register')->name('register.post');
	Route::get('login', 'LoginController@showLoginForm')->name('login');
	Route::post('login', 'LoginController@login')->name('login.post');

});


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

		// Route::get('members', 'MembersController@index')->name('members.index');
		// Route::get('members/banned', 'MembersController@banned')->name('members.banned');
		// Route::get('members/{user}', 'MembersController@show')->name('members.show');
		// Route::delete('members/{user}', 'MembersController@ban')->name('members.ban');
		// Route::post('members/{user}/unban', 'MembersController@unban')->name('members.unban');
		// Route::get('members/{user}/transactions', 'MembersController@transactions')->name('members.transactions');
		// Route::get('members/{user}/bets', 'MembersController@bets')->name('members.bets.index');
		// Route::get('members/{user}/bets/winning', 'MembersController@winningBets')->name('members.bets.winning');
		// Route::get('members/{user}/bets/losing', 'MembersController@losingBets')->name('members.bets.losing');
		// Route::get('members/{user}/bets/pending', 'MembersController@pendingBets')->name('members.bets.pending');

		// Route::resource('events', 'EventsController');
		// Route::resource('bets', 'BetsController');

		// DEMO
		// Route::get('events', 'EventsController@index')->name('events.index');
		// Route::get('bets', 'BetsController@index')->name('bets.index');
		
		Route::resource('games', 'GamesController');
		// Route::resource('teams', 'TeamsController');
		// Route::resource('events', 'EventsController');
		Route::resource('athletes', 'AthletesController');

		Route::get('teams', 'TeamsController@index')->name('teams.index');
		Route::get('teams/create', 'TeamsController@create')->name('teams.create');
		Route::post('teams/create/choose-athletes', 'TeamsController@finishCreate')->name('teams.create.finish');
		Route::post('teams', 'TeamsController@store')->name('teams.store');
		Route::get('teams/{team}', 'TeamsController@show')->name('teams.show');
		Route::get('teams/{team}/edit', 'TeamsController@edit')->name('teams.edit');
		Route::post('teams/{team}/edit/choose-athletes', 'TeamsController@finishEdit')->name('teams.edit.finish');
		Route::put('teams/{team}', 'TeamsController@update')->name('teams.update');
		Route::delete('teams/{team}', 'TeamsController@destroy')->name('teams.destroy');

		Route::get('events', 'EventsController@index')->name('events.index');
		Route::get('events/create', 'EventsController@create')->name('events.create');
		Route::post('events/create/choose-athletes', 'EventsController@finishCreate')->name('events.create.finish');
		Route::post('events', 'EventsController@store')->name('events.store');
		Route::get('events/{event}', 'EventsController@show')->name('events.show');
		Route::get('events/{event}/edit', 'EventsController@edit')->name('events.edit');
		Route::post('events/{event}/edit/choose-athletes', 'EventsController@finishEdit')->name('events.edit.finish');
		Route::put('events/{event}', 'EventsController@update')->name('events.update');
		Route::delete('events/{event}', 'EventsController@destroy')->name('events.destroy');
	});


});