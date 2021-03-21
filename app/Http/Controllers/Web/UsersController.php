<?php

namespace App\Http\Controllers\Web;

/*
 * Illuminate Classes
 */
use Illuminate\Http\Request;

/*
 * Services
 */
use App\Facades\Constant;

/*
 * Controllers
 */
use App\Http\Controllers\Controller;


/*
 * Models
 */
use App\Models\User;


class UsersController extends Controller
{


	/**
	 * List all of the users in our system.
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function index(Request $request){

		$users = User::all();

		return view('pages/users', ['users' => $users]);

	}



	public function show(Request $request){

	}

}
