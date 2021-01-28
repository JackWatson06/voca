<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{


	public function index(Request $request){

		$users = User::all();

		return view('pages/users', ['users' => $users]);

	}

	public function show(Request $request){

	}

}
