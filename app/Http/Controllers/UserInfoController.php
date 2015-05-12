<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInfoForm;
use App\Http\Requests\UpdateEmailForm;
use App\Http\Requests\UpdatePasswordForm;

use Illuminate\Http\Request;
use Auth;
use App\Userinfo;
use App\User;
use Hash;

class UserInfoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check()) {

			$userinfo = ['username'=>Auth::user()->name];
			$userinfo['billinfo'] = Userinfo::where('users_id','=',Auth::user()->id)->get()->toArray();
			
			if (!array_key_exists('0', $userinfo['billinfo'])) {

				
				$userinfo['billinfo'] = null;

			}	
			
			return view('frontend.account.account',$userinfo);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateInfoForm $CiF)
	{


		$userinfexists = Userinfo::where('users_id','=',Auth::user()->id);
		$tester = $userinfexists->get()->toArray();
		if (!array_key_exists('0', $tester)) {
			Userinfo::create([
				'name'=>$CiF->get('firstname'),
				'surename'=>$CiF->get('surname'),
				'age'=>$CiF->get('date'),
				'adress'=>$CiF->get('street-address'),
				'zipcode'=>$CiF->get('postcode'),
				'stad'=>$CiF->get('city'),
				'country'=>$CiF->get('country'),
				'users_id'=>Auth::user()->id,
				]);
			return redirect('account');
		}else{
			/*$userinfexists->name = $CiF->get('firstname');
			$userinfexists->surename = $CiF->get('surname');
			$userinfexists->age = $CiF->get('date');
			$userinfexists->adress = $CiF->get('street-address');
			$userinfexists->zipcode = $CiF->get('postcode');
			$userinfexists->stad = $CiF->get('city');
			$userinfexists->country = $CiF->get('country');
			*/
			
			$userinfexists->update([
				'name'=>$CiF->get('firstname'),
				'surename'=>$CiF->get('surname'),
				'age'=>$CiF->get('date'),
				'adress'=>$CiF->get('street-address'),
				'zipcode'=>$CiF->get('postcode'),
				'stad'=>$CiF->get('city'),
				'country'=>$CiF->get('country'),
				]);


			return redirect('account');
		}

		

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public function ChangeEmail()
	{
		return view('frontend.account.changeEmail',['username'=>Auth::user()->name,'email'=>Auth::user()->email,'errormes'=>null]);
	}
	public function postChangeEmail(UpdateEmailForm $Up)
	{
		if ($Up->get('newemail') == $Up->get('newemail2')) {
			$user = User::find(Auth::user()->id);
			$user->email = $Up->get('newemail');
			$user->save();
			return redirect('/account/email');
		}else{
			return view('frontend.account.changeEmail',['username'=>Auth::user()->name,'email'=>Auth::user()->email,'errormes'=>'een van de emails klopt niet']);
		}
	}
	public function ChangePassword()
	{


		return view('frontend.account.changePassword',['username'=>Auth::user()->name,'email'=>Auth::user()->email,'errormes'=>null]);
	}
	public function PostChangePassword(UpdatePasswordForm $pass)
	{
		if ($pass->get('newemail') === $pass->get('newemail2')) {
			$user = User::find(Auth::user()->id);
			$user->password = Hash::make($pass->get('newemail'));
			$user->save();
			return redirect('/account/password');
		}else{
			return view('frontend.account.changePassword',['username'=>Auth::user()->name,'errormes'=>'uw 2 wachtwoorden komen niet overeen']);
		}
	}

}
