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

Route::post('/rollbar/test', 'HomeController@testRollbar')->name('rollbar.test');

Route::post('/notification/test', 'HomeController@testNotification')->name('notification.test');

Route::any('/pusher', function () {
	event(new App\Events\HelloPusherEvent('Hi there Pusher!'));

	if (request()->ajax()) {
		return response()->json(['status' => "Event has been sent!"]);
	}
	return redirect()->route('home')->with('status', "Event has been sent!");
});
