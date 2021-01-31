<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


	/**
	 * Get the login page for users credentials
	 * @param  Request $request The Laravel request object
	 * @return View           Blade view
	 */
	public function create(Request $request){

		return view('pages/login');
	}


	/**
	 * Log the a new user into the site.
	 * @param  Request $request The Laravel request object
	 * @return View           Blade view
	 */
	public function store(Request $request){

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('web.users.index');
    }

    return back()->with('status', 'Email, or password inputed does not match our records.');
	}



	public function destroy(Request $request){

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('web.login.create');

	}

}
