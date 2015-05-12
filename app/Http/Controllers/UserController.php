<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Auth;
use Hash;
use App\User;

class UserController extends Controller {

	public function index()
	{
		return view('adminViews/logon');
	}
	public function authent()
	{
		if (Auth::attempt(['email' => Request::input('email'), 'password' => Request::input('password'), 'active' => 1]))
		{
			$theUser = Auth::user();
			$user = User::find($theUser['original']['id']);

			//dd();
			$user->online = 1;
			$user->save();
			//return Request::input('remember');
			if ($theUser['original']['state_id'] == 1) {
				return redirect('/adminDashboard');	
			}else{
				return redirect('/');
			}
    		
		}else{
			return redirect('/inlog');
		}
	
	}

	public function registerForm()
	{
		return view('guest/register');
	}
	public function registerPut()
	{
		if (Request::input('password') == Request::input('passwordConfirm')) {
			User::create([
			'name'=> Request::input('username'),
			'email'=>Request::input('email'),
			'password'=>Hash::make(Request::input('password')),
			'state_id'=> 3
			]);

			return redirect('/inlog');
		}
	}
}
