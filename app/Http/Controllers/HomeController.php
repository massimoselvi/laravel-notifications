<?php

namespace App\Http\Controllers;

use App\Notifications\TestSent;
use App\User;
use Illuminate\Http\Request;
use Notification;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('home');
	}

	public function testRollbar(Request $request) {
		if ($request->ajax()) {
			\Log::debug('Here is some debug information');
			return response()->json(['message' => 'Rollbar test.']);
		}
		return $this->index();
	}

	public function testNotification(Request $request) {
		$data = $request->input();

		if ($request->ajax()) {
			Notification::send(User::first(), new TestSent($data));

			return response()->json(['message' => 'Notification test started.']);
		}
		return $this->index();
	}

}
