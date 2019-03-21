<?php
/**
 * Created by PhpStorm.
 * User: Figoro
 * Date: 21.03.2019
 * Time: 21:21
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LoginFormController
{
	public function loginform()
	{
		return view('login.loginform');
	}

	public $successStatus = 200;

	public function signin()
	{
		if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
			$role = Auth::user()->getAttributes();
			if ($role["role"] == "admin"){
				$user = Auth::user();
				$success['token'] =  $user->createToken('MyApp')-> accessToken;
				return response()->json(['success' => $success], $this-> successStatus);
			}
			else{
				return response()->json(['error'=>'Access denied'], 401);
			}
		}
		else{
			return response()->json(['error'=>'Unauthorised'], 401);
		}
	}
}